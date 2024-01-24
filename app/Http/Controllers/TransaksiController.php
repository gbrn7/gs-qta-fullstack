<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Cabang;

class TransaksiController extends Controller
{
    public function index(){
        
        $transactions = Transaksi::with('cabang')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

        $branchs = Cabang::all();

        return view('data-transaksi', compact('transactions', 'branchs'));
    }

    public function filter(Request $request){
        $dateRange = $request->dateRange;
        $dateColumn= $request->dateColumn;

        $startDate= $dateRange ? (date("Y-m-d 00-00-00", strtotime(explode(" - ",$dateRange)[0]))) : null;
        $endDate = $dateRange ? (date("Y-m-d 23:59:59", strtotime(explode(" - ",$dateRange)[1]))) : null;

        
        $transactions = Transaksi::with('cabang')
                        ->where('nama_pasien', 'like', '%'.$request->nama.'%')
                        ->whereRelation('cabang', 'id', 'like', '%'.$request->branchId.'%')
                        ->when($dateRange != null, function ($query, $dateRange) use($dateColumn, $startDate, $endDate) {
                            return $query->whereBetween($dateColumn, [$startDate, $endDate]);
                        })
                        ->orderBy('id', 'desc')
                        ->paginate($request->paginate);

        return view('data-transaksi', ['transactions' => $transactions, 'paginate' => $request->paginate, 
        'nama' => $request->nama, 'branchs'=> Cabang::all(), 'selectedBranch' => $request->branchId , 'dateColumn'=> $dateColumn, 
        'startDate' => $dateRange ? date("y-m-d", strtotime(explode(" - ",$dateRange)[0])) : null,
        'endDate' => $dateRange ? date("y-m-d", strtotime(explode(" - ",$dateRange)[1])) : null,
        ]) ;
    }
}
