<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class BookingController extends Controller
{
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'phone' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
            'baju' => 'required',
            'message' => 'required|max:255',
        ]);

        $kostum = Baju::find($request->baju);

        if ($kostum->nama_keterangan === 2) {
            return back()->withErrors(['baju' => 'Kostum ini sedang di-booking dan tidak dapat dipesan.']);
        } elseif ($kostum->nama_keterangan === 1) {
            return back()->withErrors(['baju' => 'Kostum ini sedang di sewa dan tidak dapat dipesan.']);
        }

        $imagePath = $request->file('file')->store('images', 'public');

        Transaksi::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'file' => $imagePath,
            'id_toko' => $request->baju,
            'status' => 'pending',
            'message' => $request->message,
        ]);

        return redirect()->back()->with('sukses', 'Booking berhasil!');
    }
}
