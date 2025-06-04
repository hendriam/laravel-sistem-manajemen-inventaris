<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Edit extends Component
{
    public Category $category;
    public string $name;
    public string $description;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description ?? '';
    }

     public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name,' . $this->category->id,
            'description' => 'nullable|string',
        ]);

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Kategori berhasil diperbarui!');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.edit');
    }
}
