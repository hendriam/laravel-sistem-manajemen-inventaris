<?php

namespace App\Livewire\TransactionOut;

use Livewire\Component;
use App\Models\Transaction;

class Show extends Component
{
    public Transaction $transaction;

     public function mount($id)
    {
        $this->transaction = Transaction::with(['details.inventory', 'createdBy'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.transaction-out.show');
    }
}
