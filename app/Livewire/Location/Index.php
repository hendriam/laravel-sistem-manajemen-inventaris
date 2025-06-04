<?php

namespace App\Livewire\Location;

use Livewire\Component;
use App\Models\Location;
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
        Location::findOrFail($id)->delete();
        session()->flash('success', 'Kategori berhasil dihapus.');
    }

    public function render()
    {
        $locations = Location::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.location.index', compact('locations'));
    }
}
