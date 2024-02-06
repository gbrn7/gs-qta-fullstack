<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\KontenHeader;
use App\Models\KontenPelayanan;
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
    
    public function kontenBody()
    {
        $logo = Gambar::where('nama', 'logo')->first();

        $kontenPelayanan = KontenPelayanan::where('id', '<>', 1)->get();
        
        $judulkontenPelayanan = KontenPelayanan::where('id',  1)->first();

        return view('Manajemen_Konten.konten-body' , [
            'logo' => $logo,
            'judulKontenPelayanan' => $judulkontenPelayanan,
            'kontenPelayanan' => $kontenPelayanan,
        ]);
    }

    public function deleteKontenBody(Request $request)
    {
        $itemId = $request->id;
        $dataItem = KontenPelayanan::find($itemId);

        if($dataItem){

            if(!empty($dataItem->thumbnail)){
                //delte img from storage
                Storage::delete('public/image/'.$dataItem->thumbnail);
            }

            $dataItem->delete();

            return back()->with('toast_success', 'Konten berhasil dihapus!');

        }else{
            return back()->with('toast_error', 'Konten tidak ditemukan!');
        }
    }


    public function updateJudulKontenBody(Request $request)
    {
        $NewJudulkontenPelayanan = $request->validate(
            [
                'judul' => 'required|string',
            ], 
            [
                'required' => 'Data :attribute harus diisi',
            ]
        );

        try {
            $judulkontenPelayanan = KontenPelayanan::where('id',  1)->first();

            $judulkontenPelayanan->update($NewJudulkontenPelayanan);

            return back()->with('toast_success', 'Berhasil memperbarui judul konten body');
            
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }


    }

}
