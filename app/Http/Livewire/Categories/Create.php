<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required|string|min:4|max:255|unique:categories,name'
    ];

    protected $messages = [
        'category.name.required' => 'Campo categoria obrigarotio',
        'category.name.string' => 'o campo precisa ser do tipo texto',
        'category.name.min' => 'quantidade minima 4 caracteres',
        'category.name.max' => 'quantidade maxima 255 caracteres',
        'category.name.unique' => 'categoria já existente'
    ];

    public function mount()
    {
        $this->category = new Category();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.categories.create');
    }

    public function save()
    {
        $this->validate();
        $this->category->save();

        session()->flash('message', 'Categoria criada com sucesso!');

        return redirect()->route('category.index');
    }
}
