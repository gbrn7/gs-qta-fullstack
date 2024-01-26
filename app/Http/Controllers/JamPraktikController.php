<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamPraktik;
use App\Models\Cabang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;


class JamPraktikController extends Controller
{
     public function index(Request $request)
     {
      $branchId = $request->branchId;
      $tanggal = isset($request->tanggal) ? $request->tanggal : date("Y-m-d");
            
      $transactions = Transaksi::where('id_cabang', 'like', '%'.$branchId.'%')
                     ->whereBetween('tanggal_reservasi', [(date("Y-m-d 00-00-00", strtotime($tanggal))), (date("Y-m-d 23:59:59", strtotime($tanggal)))])
                     ->get(); 

      $times = JamPraktik::with('cabang')
                     ->when(isset($branchId), function ($query) use($branchId) {
                        return $query->whereRelation('cabang', 'id', 'like', '%'.$branchId.'%');
                     })
                     ->orderBy('id', 'desc')    
                     ->paginate(10);
      
         
      for ($i=0; $i < count($times); $i++) { 
         $x = 0;
         for ($j=0; $j < count($transactions); $j++) { 
            if($transactions[$j]->id_cabang === $times[$i]->id){
               $x++;
            }
         }
         $times[$i]['sisa'] = ($times[$i]->kuota - $x);
      }

        $branchs = Cabang::all();

        return view('Data_Jam_Praktik.data-jam-praktik', ['times' => $times, 'branchs' => $branchs, 'selectedBranch' => $request->branchId ? $request->branchId: null, 'tanggal' => $tanggal]);
     }

     public function store(Request $request)
     {
         $jamPraktik = $request->validate(
            [
               'id_cabang' => 'nullable|string',
               'jam_mulai' => 'required',
               'jam_selesai' => 'required',
               'kuota' => 'required|numeric',
               'status' => 'required|boolean',
            ], 
            [
               'required' => 'Data :attribute harus diisi',
               'string' => 'Data :attribute harus bertipe String',
               'numerix' => 'Data :attribute harus bertipe Angka',
               'boolean' => 'Data :attribute harus bertipe Boolean',
            ]
      );

         DB::beginTransaction();

         try {
            if(isset($jamPraktik['id_cabang'])){
               JamPraktik::create($jamPraktik);
            }else{
               $branchs = Cabang::all();
               $bulkInsert = [];
               foreach ($branchs as $key => $branch) {
                  $arr = [
                     'id_cabang' => $branch->id,
                     'jam_mulai' => $jamPraktik['jam_mulai'],
                     'jam_selesai' => $jamPraktik['jam_selesai'],
                     'kuota' => $jamPraktik['kuota'],
                     'status' => $jamPraktik['status'],
                  ];
                  array_push($bulkInsert, $arr);
               }
               JamPraktik::insert($bulkInsert);
            }

               DB::commit();

               return redirect()->route('admin.data.jam-praktik')->with('toast_success', 'Berhasil menambahkan Jam Praktik'.$request->nama);
         } catch (\Throwable $th) {
               DB::rollback();
               return back()->with('toast_error', $th->getMessage());
         }
     }

     public function update(Request $request)
     {
      $jamPraktikBaru = $request->validate(
         [
            'id' => 'required',
            'id_cabang' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'kuota' => 'required|numeric',
            'status' => 'required|boolean',
         ], 
         [
            'required' => 'Data :attribute harus diisi',
            'string' => 'Data :attribute harus bertipe String',
            'numerix' => 'Data :attribute harus bertipe Angka',
            'boolean' => 'Data :attribute harus bertipe Boolean',
         ]
      );

         DB::beginTransaction();
         try {
            $jamPraktikLama = JamPraktik::find($request->id);
            $jamPraktikLama->update($jamPraktikBaru);

            DB::commit();
            return redirect()->route('admin.data.jam-praktik')->with('toast_success', 'Berhasil memperbarui data jam praktik');
         } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
         }
     }

     public function delete(Request $request)
     {
         $jamPraktikId = $request->validate(
            [
               'id' => 'required',
            ], 
            [
               'required' => 'Data :attribute harus ada',
            ]
      );

         $jamPraktik = JamPraktik::where('id',$jamPraktikId)->firstorfail()->delete();

         return redirect()->route('admin.data.jam-praktik')->with('toast_success', 'Data Jam Praktik dihapus!');
     }
}
