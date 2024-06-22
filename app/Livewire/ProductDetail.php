<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetail extends Component
{
    public $paket;
    public $reviews;
    public $reviewCount;
    public $newReview;

    public function mount($nama_paket)
    {
        $this->paket = DB::table('paket_biasa')->where('nama_paket', $nama_paket)->first();

        if (!$this->paket) {
            abort(404, 'Paket tidak ditemukan');
        }

        $this->reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->where('paket_id', $this->paket->id)
            ->where('paket_type', 'paket_biasa')
            ->select('reviews.*', 'users.name as reviewer_name')
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
            'type' => 'paket_biasa',
        ];

        $this->dispatchBrowserEvent('addItemToCart', $item);
    }

    public function addReview()
    {
        $this->validate([
            'newReview' => 'required|string',
        ]);

        DB::table('reviews')->insert([
            'paket_id' => $this->paket->id,
            'paket_type' => 'paket_biasa',
            'review' => $this->newReview,
            'user_id' => auth()->id(), // Assuming user is authenticated
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Refresh the page
        return redirect()->route('detail', ['nama_paket' => $this->paket->nama_paket]);
    }

    public function render()
    {
        return view('livewire.product-detail', [
            'paket' => $this->paket,
            'reviews' => $this->reviews,
            'reviewCount' => $this->reviewCount,
        ]);
    }
}
