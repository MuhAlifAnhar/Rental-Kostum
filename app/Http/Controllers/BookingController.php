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
            'datee' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
            'baju' => 'required',
            'message' => 'required|max:255',
        ]);

        $kostum = Baju::find($request->baju);

        // if ($kostum->nama_keterangan === 2) {
        //     return back()->withErrors(['baju' => 'Kostum ini sedang di-booking dan tidak dapat dipesan.']);
        // } elseif ($kostum->nama_keterangan === 1) {
        //     return back()->withErrors(['baju' => 'Kostum ini sedang di sewa dan tidak dapat dipesan.']);
        // }
        // Cek apakah ada transaksi sebelumnya dengan kostum yang sama
        $existingTransaksi = Transaksi::where('id_toko', $request->baju)
            ->where(function($query) {
                $query->where('status', 'pending')
                      ->orWhere('status', 'success');
            })
            ->first();

        // if ($existingTransaksi) {
        //     // Jika ada transaksi sebelumnya, cek tanggal pengembalian
        //     if ($request->datee <= $existingTransaksi->tanggal_pengembalian) {
        //         return back()->withErrors(['baju' => 'Kostum ini tidak tersedia untuk sewa karena masih dipakai atau dibooking hingga tanggal pengembalian sebelumnya.']);
        //     }
        // }

        if ($existingTransaksi) {
        // Jika ada transaksi sebelumnya, cek apakah rentang tanggal bertabrakan
            if (
                ($request->date >= $existingTransaksi->date && $request->date <= $existingTransaksi->tanggal_pengembalian) || // Tanggal sewa baru berada di dalam rentang transaksi sebelumnya
                ($request->datee >= $existingTransaksi->date && $request->datee <= $existingTransaksi->tanggal_pengembalian) || // Tanggal pengembalian baru berada di dalam rentang transaksi sebelumnya
                ($request->date <= $existingTransaksi->date && $request->datee >= $existingTransaksi->tanggal_pengembalian) // Rentang baru mencakup seluruh rentang transaksi sebelumnya
            ) {
                return back()->withErrors(['baju' => 'Kostum ini tidak tersedia untuk sewa pada rentang tanggal yang dipilih karena bertabrakan dengan pemesanan sebelumnya.']);
            }
        }

        $imagePath = $request->file('file')->store('images', 'public');

        Transaksi::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'tanggal_pengembalian' => $request->datee,
            'time' => $request->time,
            'file' => $imagePath,
            'id_toko' => $request->baju,
            'status' => 'pending',
            'message' => $request->message,
        ]);

        return redirect()->back()->with('sukses', 'Booking berhasil!');
    }
}
