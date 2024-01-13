<?php

namespace App\Http\Livewire\Ecommerce\Components;

use Livewire\Component;
use Illuminate\Support\Str;

class Cart extends Component
{
    public $visible;
    public $cart;


    protected $listeners = ['addToCart'];

    public function mount()
    {
        $cart = session()->get('cart');

        $this->cart = $cart ?? [];
    }

    public function render()
    {
        return view('livewire.ecommerce.components.cart');
    }

    public function addToCart($products)
    {
        $this->cart[] = ['id' => Str::uuid(), 'product' => $products];

        session()->put('cart', $this->cart);

        $this->visible = true;
    }
}
