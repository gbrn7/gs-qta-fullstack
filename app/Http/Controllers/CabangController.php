<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\Gambar;
use Illuminate\Support\Facades\DB;

class CabangController extends Controller
{
    public function index(Request $request)
    {
        $logo = Gambar::where('nama', 'logo')->first();
        $branchs = Cabang::where('nama', 'like', '%'.$request->nama.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        
                    return view('Data_Cabang.data-cabang', ['branchs' => $branchs, 'nama' => $request->nama, 'logo' => $logo]);
    }

    public function store(Request $request)
    {
        $branch = $request->validate(
            [
                'nama' => 'required|string',
                'alamat' => 'required|string',
                'no_telepon' => 'nullable|string',
                'status' => 'nullable|boolean',
            ], 
            [
                'required' => 'Data :attribute harus diisi',
                'string' => 'Data :attribute harus bertipe String',
                'boolean' => 'Data :attribute harus bertipe Boolean',
            ]
        );

        DB::beginTransaction();

        try {
            Cabang::create($branch);

            DB::commit();

            return redirect()->route('admin.data.cabang')->with('toast_success', 'Berhasil menambahkan cabang '.$request->nama);
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }

    }

    public function update(Request $request)
    {
        $newBranch = $request->validate(
            [
                'id' => 'required',
                'nama' => 'required|string',
                'alamat' => 'required|string',
                'no_telepon' => 'nullable|string',
                'status' => 'nullable|boolean',
            ], 
            [
                'required' => 'Data :attribute harus diisi',
                'string' => 'Data :attribute harus bertipe String',
                'boolean' => 'Data :attribute harus bertipe Boolean',
            ]
        );

        DB::beginTransaction();

        try {
            $oldCabang = Cabang::find($request->id);
            $oldCabang->update($newBranch);

            DB::commit();

            return redirect()->route('admin.data.cabang')->with('toast_success', 'Berhasil memperbarui data cabang '.$newBranch['nama']);
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }

    }

    public function delete(Request $request)
    {
        $branchId = $request->validate(
            [
                'id' => 'required',
            ], 
            [
                'required' => 'Data :attribute harus ada',
            ]
        );

        $branch = Cabang::where('id',$branchId)->firstorfail()->delete();

        return redirect()->route('admin.data.cabang')->with('toast_success', 'Data cabang dihapus!');
    }
}
