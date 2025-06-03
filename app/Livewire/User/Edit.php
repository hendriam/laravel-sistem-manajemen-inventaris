<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public User $user;

    public string $name = '';
    public string $username = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int|string|null $role_id = null;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role_id = $user->role_id;
    }

    public function update()
    {
        // Validasi
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|min:6|unique:users,username,'.$this->user->id,
            'password' => 'nullable|confirmed|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $this->user->update([
            'name' => $this->name,
            'username' => $this->username,
            'role_id' => $this->role_id,
            'password' => $this->password ? Hash::make($this->password) : $this->user->password,
        ]);

        session()->flash('success', 'User berhasil diperbarui.');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.user.edit', [
            'roles' => Role::select('id', 'name')->get(),
        ]);
    }
}
