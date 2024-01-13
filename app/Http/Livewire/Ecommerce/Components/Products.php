<?php

namespace App\Http\Livewire\Ecommerce\Components;

use App\Models\Category;
use Illuminate\Support\Arr;
use Livewire\Component;

class Products extends Component
{
    public $categories;
    
    protected $listeners = ['filtersAdded', 'filtersRemoved'];

    public function mount()
    {
        $this->categories = Category::with('products.photos', 'products.skus')->get();
    }

    public function render()
    {
        return view('livewire.ecommerce.components.products');
    }

    public function filtersAdded($filters)
    {
        $filters = Arr::map($filters, function ($item) {
            return $item['id'];
        });

        $this->categories = Category::with('products.photos')->whereIn('id', $filters)->get();
    }

    public function filtersRemoved($filters)
    {
        $filters = Arr::map($filters, function ($item) {
            return $item['id'];
        });

        if(count($filters) > 0){
            $this->categories = Category::with('products.photos')->whereIn('id', $filters)->get();
        } else {
            $this->categories = Category::with('products.photos')->get();
        }
    }
}
