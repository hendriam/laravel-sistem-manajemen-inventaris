<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Title('Sign In')] 

    public string $username = '';
    public string $password = '';

    public function login()
    {
        $this->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        $this->addError('username', 'Username atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
