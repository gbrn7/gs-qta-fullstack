<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JamPraktik;
use App\Models\Cabang;
use App\Models\Informasi;
use App\Models\Gambar;
use App\Models\KontenHeader;
use App\Models\KontenPelayanan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $user = User::firstOrFail();

        $informasi = Informasi::first();

        $logo = Gambar::where('nama', 'logo')->first();
        $homeBg = Gambar::where('nama', 'home-bg')->first();

        $headerContent = KontenHeader::first();

        $JudulkontenPelayanan = KontenPelayanan::where('id',  1)->first();
        $kontenPelayanan = KontenPelayanan::where('id', '<>', 1)->get();

        $noTelepon = str_replace('08', '628', ($user->no_telepon ?  $user->no_telepon : '628118850501')); 

        return view('Client.client-page', [
            'informasi' => $informasi, 
            'noTelepon' => $noTelepon, 
            'logo' => $logo, 
            'homeBg' => $homeBg, 
            'headerContent' => $headerContent, 
            'JudulkontenPelayanan' => $JudulkontenPelayanan,
            'kontenPelayanan' => $kontenPelayanan, 
        ]);
    }

    public function formView()
    {
        $branchs = Cabang::where('status', '1')->get();

        $user = User::firstOrFail();
        
        $logo = Gambar::where('nama', 'logo')->first();


        $noTelepon = str_replace('08', '628', ($user->no_telepon ?  $user->no_telepon : '628118850501')); 

        return view('Client.form', ['branchs' => $branchs, 'noTelepon' => $noTelepon, 'logo' => $logo]);
    }

    public function getJamPraktik(Request $request)
    {
        try {
            $tanggal = $request->tanggalReservasi;
            $branchId = $request->branchId;
    
            $transactions = Transaksi::where('id_cabang', $branchId)
            ->whereBetween('tanggal_reservasi', [(date("Y-m-d 00-00-00", strtotime($tanggal))), (date("Y-m-d 23:59:59", strtotime($tanggal)))])
            ->get(); 
    
    
            $times = JamPraktik::where('id_cabang', $branchId)
                    ->where('status', 1)
                    ->orderBy('id', 'desc')    
                    ->get();
    
    
            for ($i=0; $i < count($times); $i++) 
            { 
                $x = 0;
                    for ($j=0; $j < count($transactions); $j++) 
                    { 
                        if($transactions[$j]->id_cabang === $times[$i]->id){
                        $x++;
                        }
                    }

                    if(($times[$i]->kuota - $x) > 0){
                        $times[$i]['jam_mulai'] = (date("H:i", strtotime($times[$i]['jam_mulai'])));
                        $times[$i]['jam_selesai'] = (date("H:i", strtotime($times[$i]['jam_selesai'])));
                        $times[$i]['sisa'] = ($times[$i]->kuota - $x);
                    }else{
                        $times->forget($i);
                    }
            }
    
            return response()->json(['data' => $times], 200);
        } catch (\Throwable $th) {
            return response()->json(['data' => $th->getMessage()], 400);
        }

    } 

    public function storeTransaction(Request $request)
    {
        $validation = [
            'id_cabang' => 'required|string',
            'id_jam_praktik' => 'required|string',
            'nama_pasien' => 'required|string',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'tanggal_reservasi' => 'required|string',
            'keluhan' => 'nullable|string',
        ];

        $message = [
            'required' => 'Data :attribute harus diisi',
            'string' => 'Data :attribute harus bertipe String',
        ];

        $validator = Validator::make($request->all(),$validation, $message);

        if($validator->fails()){
            return response()->json(['errors' => $validator->messages()], 400);
        }

        DB::beginTransaction();

        try {
            $jamPraktik = JamPraktik::find($request->id_cabang);
            
            $transactions = Transaksi::create([
                'id_cabang' => $request->id_cabang,
                'id_jam_praktik' => $request->id_jam_praktik,
                'jam_mulai' => $jamPraktik->jam_mulai,
                'jam_selesai' => $jamPraktik->jam_selesai,
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal_reservasi' => $request->tanggal_reservasi,
                'keluhan' => $request->keluhan,
            ]);

            DB::commit();

            return response()->json($transactions, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['data' => $th->getMessage()], 400);
        }

    }
}
