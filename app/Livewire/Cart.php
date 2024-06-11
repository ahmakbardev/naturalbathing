<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total = 0;

    protected $listeners = ['addItemToCart' => 'addItem'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = Session::get('cart', []);
        $this->calculateTotal();
    }

    public function addItem($item)
    {
        $itemKey = $item['id'] . '_' . $item['type'];

        if (isset($this->cart[$itemKey])) {
            $this->cart[$itemKey]['quantity']++;
        } else {
            $this->cart[$itemKey] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'image' => $item['image'],
                'quantity' => 1,
                'type' => $item['type'],
            ];
        }

        Session::put('cart', $this->cart);
        $this->calculateTotal();
        $this->dispatch('cartUpdated');
    }

    public function increaseQuantity($key)
    {
        if (isset($this->cart[$key])) {
            $this->cart[$key]['quantity']++;
            Session::put('cart', $this->cart);
            $this->calculateTotal();
            $this->dispatch('cartUpdated');
        }
    }

    public function decreaseQuantity($key)
    {
        if (isset($this->cart[$key]) && $this->cart[$key]['quantity'] > 1) {
            $this->cart[$key]['quantity']--;
            Session::put('cart', $this->cart);
            $this->calculateTotal();
            $this->dispatch('cartUpdated');
        } elseif (isset($this->cart[$key]) && $this->cart[$key]['quantity'] === 1) {
            unset($this->cart[$key]);
            Session::put('cart', $this->cart);
            $this->calculateTotal();
            $this->dispatch('cartUpdated');
        }
    }

    public function calculateTotal()
    {
        $this->total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $this->cart));
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
