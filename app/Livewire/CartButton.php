<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartButton extends Component
{
    public $itemCount = 0;
    public $idName;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount($idName = null)
    {
        $this->idName = $idName;
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $cart = Session::get('cart', []);
        $this->itemCount = array_sum(array_column($cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.cart-button');
    }
}
