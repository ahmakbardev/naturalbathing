<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $heroSections = DB::table('hero_section')->first();
        $paketBiasas = DB::table('paket_biasa')->get();
        $paketSpesial = DB::table('paket_spesial')->get();
        $mapSection = DB::table('map_sections')->first(); // Mengambil data peta

        return view('index', compact(['heroSections', 'paketBiasas', 'paketSpesial', 'mapSection']));
    }
}
