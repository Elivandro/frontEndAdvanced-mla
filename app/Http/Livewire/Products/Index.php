<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public Product $product;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::orderBy('name')->paginate(10)
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

       return redirect()->route('product.index')->with('message', 'Produto deletado com sucesso.');
    }
}
