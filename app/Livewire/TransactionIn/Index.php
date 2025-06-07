<?php

namespace App\Livewire\TransactionIn;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class Index extends Component
{
    use WithPagination;
    
    public string $search = '';
    public string $sortField = 'transacted_at';
    public string $sortDirection = 'asc';
    
    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortField = $field;
    }

    public function render()
    {
        $transactions = Transaction::with(['createdBy', 'updatedBy'])
            ->where('type', 'in')
            ->where('reference', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.transaction-in.index', compact('transactions'));
    }
}
