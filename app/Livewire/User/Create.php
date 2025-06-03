<?php

namespace App\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $username = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int|string|null $role_id = null;
    
    public function save()
    {
        // Validasi
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|min:6|unique:users,username',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
        ]);

        session()->flash('success', 'User baru berhasil ditambahkan!');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.user.create', [
            'roles' => Role::select('id', 'name')->get(),
        ]);
    }
}
