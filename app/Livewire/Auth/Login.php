<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth')]
class Login extends Component
{
     #[Title('Sign In')] 
    public function render()
    {
        return view('livewire.auth.login');
    }
}
