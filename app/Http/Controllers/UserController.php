<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view("user.index");
    }

    function kostum(){
        return view("user.kostum");
    }

    function kontak(){
        return view("user.kontak");
    }

    function syarat(){
        return view("user.syarat");
    }

    function login(){
        return view("user.login");
    }

    function registrasi(){
        return view("user.register");
    }

    public function logine(Request $request){
        $validasi = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);
        if(Auth::attempt($validasi)){
        //  jika dia guru
            if(Auth::user()->role_id === 1 ){
                if(Auth::user()->toko){
                    if(Auth::user()->toko->id_admin === Auth::user()->id ){
                        $request->session()->regenerate();
                        return redirect()->intended('/admin');
                    }else {
                        return back()->with('error','Login gagal! Anda Bukan Admin Toko');
                    }
                }else {
                    return back()->with('error', 'Login gagal! Anda tidak memiliki toko.');
                }
            }
            if(Auth::user()->role_id === 2 ){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
        }
        return back()->with('error','Login gagal! Username atau Password Anda Salah');
    }

     public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255', 'same:confirm-password'],
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);



        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role,
        ]);


        $request->session()->flash('success','Registrasi sukses! Silahkan login');

        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
