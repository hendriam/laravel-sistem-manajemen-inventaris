<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public string $name = '';
    public string $username = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->username = $user->username;
    }

    public function updateProfile()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|min:6|unique:users,username,'. Auth::user()->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        Auth::user()->update($data);

        session()->flash('success', 'Profil berhasil diperbarui!');
        return redirect()->route('profile.show');
    }

    public function render()
    {
        return view('livewire.profile.edit');
    }
}
