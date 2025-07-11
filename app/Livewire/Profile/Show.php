<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public function render()
    {
        return view('livewire.profile.show', [
            'user' => Auth::user(),
        ]);
    }
}
