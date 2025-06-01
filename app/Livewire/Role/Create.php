<?php

namespace App\Livewire\Role;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Role;

class Create extends Component
{
    public $name;
    public $description;
    public $roles;
    
    public function save(Request $request)
    {
        // Validasi
        $this->validate([
            'name' => 'required|string|unique:roles,name',
            'description' => 'nullable|string',
        ]);

        Role::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset('name');
        $this->reset('description');

        return redirect()->to('/roles');
    }

    public function render()
    {
        return view('livewire.role.create');
    }
}
