<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamPraktik;
use App\Models\Cabang;
use App\Models\Transaksi;

class JamPraktikController extends Controller
{
     public function index(Request $request){
      $branchId = $request->branchId;
      $tanggal = $request->tanggal;
      
      $transactions = Transaksi::where('id_cabang', 'like', '%'.$branchId.'%')
                     ->when(isset($tanggal), function ($query) use($tanggal) {
                        return $query->whereBetween('created_at', [(date("Y-m-d 00-00-00", $tanggal)), (date("Y-m-d 23:59:59", $tanggal))]);
                     })
                     ->when(!isset($tanggal), function ($query)  {
                        return $query->whereBetween('created_at', [(date("Y-m-d 00-00-00")), (date("Y-m-d 23:59:59"))]);
                     })
                     ->get(); 

      $times = JamPraktik::with('cabang')
                     ->when(isset($branchId), function ($query) use($branchId) {
                        return $query->whereRelation('cabang', 'id', 'like', '%'.$branchId.'%');
                     })
                     ->orderBy('id', 'desc')    
                     ->paginate(10);
      
      // dd($transactions[0]->id_cabang, $times);
         
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

        return view('Data_Jam_Praktik.data-jam-praktik', ['times' => $times, 'branchs' => $branchs, 'selectedBranch' => $request->branchId ? $request->branchId: null]);
     }

}
