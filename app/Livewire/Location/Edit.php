<?php

namespace App\Livewire\Location;

use Livewire\Component;
use App\Models\Location;

class Edit extends Component
{
    public Location $location;
    public string $name;
    public string $description;

    public function mount(Location $location)
    {
        $this->location = $location;
        $this->name = $location->name;
        $this->description = $location->description ?? '';
    }

     public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:locations,name,' . $this->location->id,
            'description' => 'nullable|string',
        ]);

        $this->location->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Lokasi berhasil diperbarui!');
        return redirect()->route('locations.index');
    }

    public function render()
    {
        return view('livewire.location.edit');
    }
}
