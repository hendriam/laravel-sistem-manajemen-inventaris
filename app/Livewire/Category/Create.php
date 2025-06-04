<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public string $name = '';
    public string $description = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Kategori baru berhasil ditambahkan!');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.create');
    }
}
