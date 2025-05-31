<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    #[Title('Change Password')] 
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
