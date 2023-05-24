<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Product $product;
    public $categories;
    public string $search;

    protected function rules()
    {
        return [
            'product.category_id' => 'required',
            'product.name' => 'required|string|min:4|max:255|unique:products,name',
            'product.price' => 'required',
            'product.short_description' => 'required|min:4|max:255'
        ];
    }

    public function mount()
    {
        $this->product = new Product();

        $this->search = "";

        $this->categories = Category::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.products.create');
    }

    public function updatedSearch()
    {
        $this->categories = Category::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function save()
    {
        $this->validate();

        $this->product->save();

        return redirect()->route('product.index')->with('message', 'Produto criado com sucesso!');
    }
}
