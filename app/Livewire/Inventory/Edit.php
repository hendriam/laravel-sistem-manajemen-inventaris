<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Edit extends Component
{
    public Inventory $inventory;

    public string $code, $name, $unit, $condition, $description, $received_at;
    public int $quantity;
    public int|string|null $category_id, $location_id;

    public function mount(Inventory $inventory)
    {
        $this->inventory = $inventory;
        $this->code = $inventory->code;
        $this->name = $inventory->name;
        $this->category_id = $inventory->category_id;
        $this->location_id = $inventory->location_id;
        $this->quantity = $inventory->quantity;
        $this->unit = $inventory->unit;
        $this->condition = $inventory->condition;
        $this->received_at = $inventory->received_at;
        $this->description = $inventory->description;
    }

    public function update()
    {
        // Validasi
        $this->validate([
            'code' => 'required|string|max:255|min:5|unique:inventories,code,'.$this->inventory->id,
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'quantity' => 'required|numeric',
            'unit' => 'required|string',
            'condition' => 'required|string|in:baik,rusak',
            'received_at' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $nowTime = Carbon::now()->format('H:i:s');

        $this->inventory->update([
            'code' => $this->code,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'location_id' => $this->location_id,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'condition' => $this->condition,
            'received_at' => Carbon::parse($this->received_at . ' ' . $nowTime),
            'description' => $this->description,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Inventory berhasil diperbarui.');
        return redirect()->route('inventories.index');
    }

    public function render()
    {
        return view('livewire.inventory.edit',[
            'categories' => Category::all(),
            'locations' => Location::all(),
        ]);
    }
}
