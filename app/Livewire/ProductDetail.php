<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetail extends Component
{
    public $paket;

    public function mount($nama_paket)
    {
        $this->paket = DB::table('paket_biasa')->where('nama_paket', $nama_paket)->first();

        if (!$this->paket) {
            abort(404, 'Paket tidak ditemukan');
        }
    }

    public function addItem($id, $name, $price, $image)
    {
        $item = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'type' => 'paket_biasa',
        ];

        $this->dispatch('addItemToCart', $item);
    }

    public function render()
    {
        return view('livewire.product-detail', ['paket' => $this->paket]);
    }
}
