<?php

namespace App\Livewire\Location;

use Livewire\Component;
use App\Models\Location;

class Create extends Component
{
    public string $name = '';
    public string $description = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|unique:locations,name',
            'description' => 'nullable|string',
        ]);

        Location::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Lokasi baru berhasil ditambahkan!');
        return redirect()->route('locations.index');
    }

    public function render()
    {
        return view('livewire.location.create');
    }
}
