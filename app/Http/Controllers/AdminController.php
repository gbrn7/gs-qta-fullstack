<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Cabang;
use App\Models\Gambar;
use App\Models\JamPraktik;

class AdminController extends Controller
{
    public function index(){
        $countJamPraktik = JamPraktik::count();
        
        $countCabang = Cabang::count();

        $countTransaksi = Transaksi::count();

        $logo = Gambar::where('nama', 'logo')->first();

        return view('home', compact('countJamPraktik', 'countCabang', 'countTransaksi', 'logo'));
    }
}
