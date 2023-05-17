<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Product $product;

    protected $rules = [
        'product.name' => 'required|string|min:4|max:255',
        'product.price' => 'required',
        'product.description' => 'required'
    ];

    public function render()
    {
        return view('livewire.products.create');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount()
    {
        $this->product = new Product();
    }

    public function save()
    {
        $this->validate();

        $this->product->save();

        session()->flash('message', 'Produto criado com sucesso!');

        return redirect()->route('product.index');
    }
}
