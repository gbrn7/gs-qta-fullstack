<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\KontenHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KontenController extends Controller
{
    public function index()
    {
        $logo = Gambar::where('nama', 'logo')->first();
        return view('Manajemen_Konten.konten', ['logo' => $logo]);
    }

    public function kontenHeader()
    {
        $logo = Gambar::where('nama', 'logo')->first();

        $headerContent = KontenHeader::first();

        $homeBg = Gambar::where('nama', 'home-bg')->first();

        return view('Manajemen_Konten.konten-header', [
            'logo' => $logo,
            'homeBg' => $homeBg,
            'headerContent' => $headerContent,
        ]);
    }

    public function updateKontenHeader(Request $request)
    {
        $newKontenHeader = $request->validate(
            [
                'judul' => 'required|string',
                'tagline' => 'required|string',
                'deskripsi' => 'required|string',
                'teks_btn' => 'required|string',
                'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:1024'
            ], 
            [
                'required' => 'Data :attribute harus diisi',
                'string' => 'Data :attribute harus bertipe String',
                'image' => 'File gambar harus berjenis gambar',
                'mimes' => 'File gambar harus bertipe :values'
            ]
        );


        DB::beginTransaction();
        try {
            $oldKonteHeader = KontenHeader::first();
            
            if(!empty($newKontenHeader['gambar'])){
                $homeBg = Gambar::where('nama', 'home-bg')->first();

                $image = $newKontenHeader['gambar'];
                $imageName = Str::random(10).$image->getClientOriginalName();
                
                $image->storeAs('public/image', $imageName);
                Storage::delete('public/image/'.$homeBg->gambar);

                $homeBg['gambar'] = $imageName;
                $homeBg->update();
            }

            $oldKonteHeader->update($newKontenHeader);
        
            DB::commit();
            return back()->with('toast_success', 'Berhasil memperbarui konten header');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }
    }

}
