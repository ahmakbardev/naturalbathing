<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    public function create()
    {
        $cart = Session::get('cart', []);
        return view('pembayaran.create', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ss_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $invoiceId = 'INV-' . strtoupper(uniqid());

        // Tentukan path tujuan di dalam folder public
        $destinationPath = public_path('storage/bukti_pembayaran');

        // Pastikan direktori tujuan ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Pindahkan file ke direktori tujuan
        $ssPembayaran = $request->file('ss_pembayaran');
        $ssPembayaranName = $invoiceId . '.' . $ssPembayaran->getClientOriginalExtension();
        $ssPembayaran->move($destinationPath, $ssPembayaranName);

        $cart = Session::get('cart', []);
        $totalPembayaran = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $data = [
            'Invoice_ID' => $invoiceId,
            'user_id' => Auth::id(),
            'paket_data' => [
                'items' => $cart,
                'total' => $totalPembayaran,
            ],
            'ss_pembayaran' => $ssPembayaranName, // Simpan nama file saja
            'status' => false,
        ];

        Pembayaran::create($data);

        // Bersihkan sesi setelah pembayaran berhasil
        Session::forget('cart');

        return redirect()->route('home')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
