<?php

namespace App\Livewire\Inventory;

use App\Models\Inventory;
use App\Models\Category;
use App\Models\Location;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{
    public string $code, $name, $unit, $condition, $description, $received_at;
    public int $quantity;
    public int|string|null $category_id, $location_id;

    public function save()
    {
        // Validasi
        $this->validate([
            'code' => 'required|string|max:255|min:5|unique:inventories,code',
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

        Inventory::create([
            'code' => $this->code,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'location_id' => $this->location_id,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'condition' => $this->condition,
            'received_at' => Carbon::parse($this->received_at . ' ' . $nowTime),
            'description' => $this->description,
            'created_by' => Auth::id(),
        ]);

        session()->flash('success', 'Inventory baru berhasil ditambahkan!');
        return redirect()->route('inventories.index');
    }

    public function render()
    {
        return view('livewire.inventory.create',[
            'categories' => Category::all(),
            'locations' => Location::all(),
        ]);
    }
}
