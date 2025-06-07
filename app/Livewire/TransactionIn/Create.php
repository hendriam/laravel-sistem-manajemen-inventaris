<?php

namespace App\Livewire\TransactionIn;

use Livewire\Component;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public string $transaction_type = 'in';
    public string $reference;
    public string $transaction_date;
    public string $description = '';
    public ?int $location_id = null;

    public array $items = [
        ['inventory_id' => null, 'quantity' => 1, 'note' => '']
    ];

    public function mount()
    {
        $this->transaction_date = Carbon::now()->format('Y-m-d H:i');
        $this->reference = 'TRXIN'.now()->format('Ymd'). ''.str_pad(Transaction::where('type', 'out')->count() + 1, 4, '0', STR_PAD_LEFT);
    }

    public function addItem()
    {
        $this->items[] = ['inventory_id' => null, 'quantity' => 1, 'note' => ''];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function create()
    {
        $this->validate([
            'reference' => 'required|string|unique:transactions,reference',
            'transaction_date' => 'required|date',
            'location_id' => 'nullable|exists:locations,id',
            'items.*.inventory_id' => 'required|exists:inventories,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.note' => 'nullable|string|max:255',
        ]);
        
        DB::beginTransaction();

        try {
            $second = Carbon::now()->format('s');
            $transaction = Transaction::create([
                'type' => $this->transaction_type,
                'reference' => $this->reference,
                'transacted_at' => Carbon::parse($this->transaction_date.':'.$second),
                'description' => $this->description,
                'created_by' => Auth::id(),
            ]);

            foreach ($this->items as $item) {
                $transaction->details()->create([
                    'inventory_id' => $item['inventory_id'],
                    'quantity' => $item['quantity'],
                    'note' => $item['note'],
                ]);

                $inventory = Inventory::findOrFail($item['inventory_id']);

                $inventory->update([
                    'quantity' => $inventory['quantity'] + $item['quantity'],
                ]);
            }

            DB::commit();

            session()->flash('success', 'Transaksi barang masuk berhasil disimpan.');
            return redirect()->route('transaction-in.create');

        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', $th->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.transaction-in.create',[
            'inventories' => Inventory::all(),
        ]);
    }
}
