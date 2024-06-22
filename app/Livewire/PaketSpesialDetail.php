<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PaketSpesialDetail extends Component
{
    public $paket;
    public $newReview;
    public $reviews;
    public $reviewCount;

    public function mount($nama_paket)
    {
        $this->paket = DB::table('paket_spesial')->where('nama_paket', $nama_paket)->first();

        if (!$this->paket) {
            abort(404, 'Paket tidak ditemukan');
        }

        $this->reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->where('paket_id', $this->paket->id)
            ->where('paket_type', 'paket_spesial')
            ->select('reviews.*', 'users.name as user_name')
            ->get();

        $this->reviewCount = $this->reviews->count();
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

    public function addReview()
    {
        $this->validate([
            'newReview' => 'required|string',
        ]);

        DB::table('reviews')->insert([
            'paket_id' => $this->paket->id,
            'paket_type' => 'paket_spesial',
            'user_id' => auth()->id(), // Storing the user_id
            'review' => $this->newReview,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Refresh the page
        return redirect()->route('paket-spesial.detail', ['nama_paket' => $this->paket->nama_paket]);
    }

    public function render()
    {
        if (is_string($this->paket->gambar)) {
            $this->paket->gambar = json_decode($this->paket->gambar, true);
        }

        return view('livewire.paket-spesial-detail', [
            'paket' => $this->paket,
            'reviews' => $this->reviews,
            'reviewCount' => $this->reviewCount
        ]);
    }
}
