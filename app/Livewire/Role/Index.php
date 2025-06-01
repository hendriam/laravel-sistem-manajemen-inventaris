<?php

namespace App\Livewire\Role;

use Livewire\Component;
use App\Models\Role;

class Index extends Component
{
    public $name;
    public $description;
    public $roles;
    
    public function mount()
    {
        $this->roles = Role::all();
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        $this->roles = Role::all();

        session()->flash('success', 'Role berhasil dihapus!');
    }

    public function getTableDataProperty()
    {
        return $this->roles->map(function ($role, $index) {
            return [
                'data' => [
                    $index + 1,
                    $role->name,
                    $role->description ?: '-',
                ],
                'actions' => view('components.ui.actions', ['id' => $role->id])->render(),
            ];
        });
    }

    public function render()
    {
        return view('livewire.role.index');
    }
}
