<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {

        $currentUser = auth()->user();

        if(isset($currentUser)){
            return redirect()->route('admin.home');
        }else{
           return view('siginIn');
        }
    }

    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->with('toast_error', join(', ', $validator->messages()->all()));
        }

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        
        if($user){
            try {
                $pw = Crypt::decryptString($user->password);
            } catch (DecryptException $e) {
                return back()->with('toast_error', $e);
            } 
    
            if($pw === $credentials['password']){
                Auth::loginUsingId($user->id);
    
                $request->session()->regenerate();
    
                return redirect()->route('admin.home')->with('toast_success', 'Berhasil Masuk');
            }
        }
        
        return back()->with('toast_error', 'Email atau Password yang masukkan tidak valid!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('signIn');
    }

    public function getCurrentUser()
    {
        $currentUser = auth()->user();

        if($currentUser){
                $form = [
                    'id' => $currentUser->id,
                    'nama' => $currentUser->nama,
                    'email' => $currentUser->email,
                    'password' => Crypt::decryptString($currentUser->password),
                    'no_telepon' => $currentUser->no_telepon,
                ];
                return view('layouts.modal.profile-modal-form', ['form' => $form]);
        }else{
            return response()->json(["message" => "Access Denied or id not found"], 404);   
        }
    }

    public function updateUserData(Request $request)
    {
        if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' ){
            $userId = $request->id;

            $validation = [
                'nama' => 'required|string',
                'email' => 'required|string|email|unique:users,email,'.$userId.',id',
                'password' => 'nullable|string|min:5',
            ];
    
            $messages = [
                'required' => 'Kolom :attribute harus diisi',
                'string' => 'Kolom :attribute harus bertipe teks atau string',
                'email' => 'Kolom :attribute harus bertipe email',
                'unique' => ':attribute yang anda berikan sudah dipakai',
                'min' => ':attribute minimal :min digit',
            ];

            $validator = Validator::make($request->all(), $validation, $messages);

            if($validator->fails()){
                return back()
                ->with('toast_error', join(', ', $validator->messages()->all()))
                ->withInput()
                ->withErrors($validator->messages()->all());
            }

             $newUser = $request->except('role');
             $newUser['password'] = Crypt::encryptString($newUser['password']);

            $oldDataUser = User::where('id', $userId)->first();


            try {
                $oldDataUser->update($newUser);

                return back()
                ->with('toast_success', 'Data Profil Diperbarui'); 
            } catch (\Throwable $th) {
                return back()
                ->with('toast_error', $th->getMessage())
                ->withInput()
                ->withErrors($th->getMessage());
            }

        }else{
            return back()->with('toast_error', 'Akses Ditolak!!');
        }
    }
}
