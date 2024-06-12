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

        $ssPembayaranPath = $request->file('ss_pembayaran')->store('public/bukti_pembayaran');

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
            'ss_pembayaran' => basename($ssPembayaranPath),
            'status' => false,
        ];

        Pembayaran::create($data);

        // Clear the cart session
        Session::forget('cart');

        return redirect()->route('pesanan.index')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
