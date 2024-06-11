<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function show($nama_paket)
    {
        // Ambil data paket berdasarkan nama paket
        $paket = DB::table('paket_biasa')->where('nama_paket', $nama_paket)->first();

        // Jika tidak ditemukan, lempar 404
        if (!$paket) {
            abort(404);
        }

        // Decode JSON gambar
        $paket->gambar = json_decode($paket->gambar, true);
        $paket->review = json_decode($paket->review, true);

        // Kirim data ke view
        return view('content.detail', compact('paket'));
    }
}
