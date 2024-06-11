<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PaketSpesialDetail extends Component
{
    public $paket;

    public function mount($nama_paket)
    {
        $this->paket = DB::table('paket_spesial')->where('nama_paket', $nama_paket)->first();

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
            'type' => 'paket_spesial',
        ];

        $this->dispatch('addItemToCart', $item);
    }

    public function render()
    {
        if (is_string($this->paket->gambar)) {
            $this->paket->gambar = json_decode($this->paket->gambar, true);
        }

        if (is_string($this->paket->review)) {
            $this->paket->review = json_decode($this->paket->review, true);
        }

        return view('livewire.paket-spesial-detail', ['paket' => $this->paket]);
    }
}
