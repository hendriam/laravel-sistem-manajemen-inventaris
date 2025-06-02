<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use App\Models\Permission;

class Create extends Component
{
    public string $name = '';
    public string $description = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|unique:permissions,name',
            'description' => 'nullable|string',
        ]);

        Permission::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Permission berhasil ditambahkan!');
        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.permission.create');
    }
}
