<?php

namespace App\Livewire\Role;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;

class AssignPermission extends Component
{
    public $role;
    public $selectedPermissions = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
    }

    public function save()
    {
        $this->role->permissions()->sync($this->selectedPermissions);
        session()->flash('success', 'Permission berhasil di-assign ke Role.');
    }

    public function render()
    {
        return view('livewire.role.assign-permission', [
            'permissions' => Permission::orderBy('name')->get()
        ]);
    }
}
