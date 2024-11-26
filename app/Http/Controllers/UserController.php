<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Support\Facades\Gate;
use App\Models\Keterangan;
use App\Models\Baju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view("user.index");
    }

    function kostum(Request $request, $tokoId = null){
        $tokos = Toko::all();

        $keterangan = Keterangan::all();

        $baju = $tokoId ? Baju::where('id_toko', $tokoId)->get() : collect();

        return view("user.kostum", [
            'tokos' => $tokos,
            'keterangan' => $keterangan,
            'baju' => $baju,
            'selectedTokoId' => $tokoId
        ]);
    }

    public function updateStatus(Request $request)
    {
        Log::info('Update Status Request:', $request->all());

        try {
            // Validasi request jika perlu
            $request->validate([
                'baju_id' => 'required|integer|exists:baju,id',
            ]);

            // Debug: Check if baju_id is valid
            Log::info('Baju ID:', ['baju_id' => $request->baju_id]);

            // Temukan baju berdasarkan ID
            $baju = Baju::find($request->baju_id);

            // Debug: Check if baju is found
            if ($baju) {
                Log::info('Baju Found:', ['baju' => $baju]);

                // Update status baju
                if ($baju->nama_keterangan === 3) {
                    $baju->update(['nama_keterangan' => 2]);

                    Log::info('Status updated to "Di booking" for Baju ID:', ['baju_id' => $baju->id]);
                    return response()->json(['status' => 'success', 'message' => 'Status updated successfully']);
                } else {
                    Log::warning('Invalid status for Baju ID:', ['baju_id' => $baju->id]);
                }
            } else {
                Log::error('Baju not found for Baju ID:', ['baju_id' => $request->baju_id]);
            }
        } catch (\Exception $e) {
            // Debug: Log exception
            Log::error('Exception:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['status' => 'error', 'message' => 'Server error'], 500);
        }
        return response()->json(['status' => 'error', 'message' => 'Invalid status update'], 400);
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
