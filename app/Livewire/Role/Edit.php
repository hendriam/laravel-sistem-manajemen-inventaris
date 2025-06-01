<?php

namespace App\Livewire\Role;

use Livewire\Component;
use App\Models\Role;

class Edit extends Component
{
    public Role $role;
    public string $name;
    public string $description;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->description = $role->description ?? '';
    }

     public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:roles,name,' . $this->role->id,
            'description' => 'nullable|string',
        ]);

        $this->role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Role berhasil diperbarui!');
        return redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.role.edit');
    }
}
