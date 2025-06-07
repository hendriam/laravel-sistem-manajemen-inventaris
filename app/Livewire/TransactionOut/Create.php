<?php

namespace App\Livewire\TransactionOut;

use Livewire\Component;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public string $transaction_type = 'out';
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
        $this->reference = 'TRXOUT'.now()->format('Ymd'). ''.str_pad(Transaction::where('type', 'out')->count() + 1, 4, '0', STR_PAD_LEFT);
    }

    public function addItem()
    {
        if (!empty($this->items)) {
            $lastItem = end($this->items);

            if (isset($lastItem['inventory_id'], $lastItem['quantity'])) {
                $inventory = Inventory::find($lastItem['inventory_id']);

                if ($inventory && $lastItem['quantity'] > $inventory->quantity) {
                    $this->addError('items.' . (count($this->items) - 1) . '.quantity', 'Jumlah melebihi stok yang tersedia.');
                    return;
                }
            }
        }

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
        ],
        [
            'items.required' => 'Minimal harus ada 1 item.',
            'items.*.inventory_id.required' => 'Pilih item.',
            'items.*.quantity.required' => 'Isi jumlah.',
        ]);

        foreach ($this->items as $index => $item) {
            $inventory = Inventory::find($item['inventory_id']);
            if ($inventory && $item['quantity'] > $inventory->quantity) {
                $this->addError("items.{$index}.quantity", 'Jumlah melebihi stok yang tersedia (' . $inventory->quantity . ')');
            }
        }

        // Cek jika ada error dari validasi stok, stop proses
        if ($this->getErrorBag()->isNotEmpty()) {
            return;
        }

        // 🔁 Cek duplikat inventory_id
        $inventoryIds = array_column($this->items, 'inventory_id');
        $duplicates = array_diff_key($inventoryIds, array_unique($inventoryIds));
        if (!empty($duplicates)) {
            $this->addError('items', 'Terdapat item yang sama lebih dari satu kali dalam daftar.');
            return;
        }

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
                    'quantity' => $inventory['quantity'] - $item['quantity'],
                ]);
            }

            DB::commit();

            session()->flash('success', 'Transaksi barang keluar berhasil disimpan.');
            return redirect()->route('transaction-out.create');

        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', $th->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.transaction-out.create',[
            'inventories' => Inventory::all(),
        ]);
    }
}
