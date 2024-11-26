<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class BookingController extends Controller
{
    public function store(Request $request){
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

        return redirect()->back()->with('success', 'Booking berhasil!');
    }
}
