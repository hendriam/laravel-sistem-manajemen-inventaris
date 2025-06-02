<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use App\Models\Permission;

class Edit extends Component
{
    public Permission $permission;
    public string $name;
    public string $description;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->description = $permission->description ?? '';
    }

     public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:permissions,name,' . $this->permission->id,
            'description' => 'nullable|string',
        ]);

        $this->permission->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Permission berhasil diperbarui!');
        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.permission.edit');
    }
}
