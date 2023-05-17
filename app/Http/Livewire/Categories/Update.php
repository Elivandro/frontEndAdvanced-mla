<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Update extends Component
{
    public Category $category;
    
    protected function rules()
    {
        return [
            'category.name' => 'required|string|min:4|max:255|unique:categories,name,'. $this->category->id
        ];
    }

    protected $messages = [
        'category.name.required' => 'Campo categoria obrigarotio',
        'category.name.string' => 'o campo precisa ser do tipo texto',
        'category.name.min' => 'quantidade minima 4 caracteres',
        'category.name.max' => 'quantidade maxima 255 caracteres',
        'category.name.unique' => 'categoria já existente'
    ];

    public function render()
    {
        return view('livewire.categories.update');
    }

    public function save()
    {
        $this->validate();
        $this->category->save();

        session()->flash('message', 'Categoria editada com sucesso.');

        return redirect()->route('category.index');
    }
}
