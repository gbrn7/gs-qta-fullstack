<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SosmedController extends Controller
{
    public function index()
    {
        $sosmed = Sosmed::all();
        
        return view('Manjemen_Sosmed.sosmed', [
            'sosmed' => $sosmed,
        ]);
    }

    public function store(Request $request)
    {
        $newSosmed = $request->validate(
            [
                'nama' => 'required|string',
                'link' => 'required|string',
                'icon' => 'required|image|mimes:png,jpg,jpeg|max:1024',
                'status' => 'required|boolean'
            ], 
            [
                'required' => 'Data :attribute harus diisi',
                'string' => 'Data :attribute harus bertipe String',
                'image' => 'File gambar harus berjenis gambar',
                'boolen' => 'Status harus berniali true atau false',
                'mimes' => 'File gambar harus bertipe :values'
            ]
        );

        try {            
            $image = $newSosmed['icon'];
            $imageName = Str::random(10).$image->getClientOriginalName();
            
            $image->storeAs('public/image', $imageName);

            $newSosmed['icon'] = $imageName;

            $newSosmed = Sosmed::create($newSosmed);

            return back()->with('toast_success', 'Berhasil menambah konten '.$newSosmed->judul);

        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        $newSosmed = $request->validate(
            [
                'id' => 'required',
                'nama' => 'nullable|string',
                'link' => 'nullable|string',
                'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
                'status' => 'nullable|boolean'
            ], 
            [
                'required' => 'Data :attribute harus diisi',
                'string' => 'Data :attribute harus bertipe String',
                'image' => 'File gambar harus berjenis gambar',
                'boolen' => 'Status harus berniali true atau false',
                'mimes' => 'File gambar harus bertipe :values'
            ]
        );


        try {
            $oldSosmed = Sosmed::find($request->id);

            if(isset($newSosmed['icon'])){
                $image = $newSosmed['icon'];
                $imageName = Str::random(10).$image->getClientOriginalName();
                
                $image->storeAs('public/image', $imageName);
                Storage::delete('public/image/'.$oldSosmed->icon);
    
                $newSosmed['icon'] = $imageName;
            }

            $oldSosmed->update($newSosmed);
        
            return back()->with('toast_success', 'Berhasil memperbarui konten header');

        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    public function delete(Request $request){
        $itemId = $request->id;
        $dataItem = Sosmed::find($itemId);

        if($dataItem){

            if(!empty($dataItem->icon)){
                //delete img from storage
                Storage::delete('public/image/'.$dataItem->icon);
            }

            $dataItem->delete();

            return back()->with('toast_success', 'Sosmed berhasil dihapus!');

        }else{
            return back()->with('toast_error', 'Sosmed tidak ditemukan!');
        }
    }


}
