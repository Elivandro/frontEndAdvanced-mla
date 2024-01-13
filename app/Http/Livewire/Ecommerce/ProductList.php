<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.product-list')
            ->layout('layouts.ecommerce.app');
    }
}
