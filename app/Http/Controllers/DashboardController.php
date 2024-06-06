<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $heroSections = DB::table('hero_section')->first();
        // dd($heroSections);
        return view('index', compact('heroSections'));
    }
}
