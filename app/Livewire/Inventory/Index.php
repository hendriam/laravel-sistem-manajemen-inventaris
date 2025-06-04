<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = 'name';
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

    public function delete($id)
    {
        Inventory::findOrFail($id)->delete();
        session()->flash('success', 'Inventory berhasil dihapus.');
    }

    public function render()
    {
        $inventories = Inventory::with(['category', 'location', 'createdBy', 'updatedBy'])
            ->where('code', 'like', "%{$this->search}%")
            ->orWhere('name', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.inventory.index', compact('inventories'));
    }
}
