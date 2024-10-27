<?php

namespace App\Http\Controllers;

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
                $request->session()->regenerate();
                return redirect()->intended('/admin');
           }
        //    if(Auth::user()->role_id === 2 ){
        //         $request->session()->regenerate();
        //         return redirect()->intended('/admin');
        //    }
         }

         return back()->with('error','Login gagal!');
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
}
