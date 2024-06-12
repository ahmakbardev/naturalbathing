<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pembayaran::where('user_id', Auth::id())->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function generateInvoice($id)
    {
        $pesanan = Pembayaran::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        $pdf = FacadePdf::loadView('pesanan.invoice', compact('pesanan'));

        return $pdf->download('invoice-' . $pesanan->Invoice_ID . '.pdf');
    }
}
