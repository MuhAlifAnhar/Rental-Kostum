<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Baju;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct() {
         // Admin dan Operator bisa mengakses `index` dan `show`
        $this->middleware('can:isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');

        $idToko = Auth::user()->toko->id; // Pastikan kolom id_toko ada pada tabel users atau sesuai struktur Anda

        $transaksi = Transaksi::whereHas('kostum', function ($query) use ($idToko) {
            $query->where('id_toko', $idToko);
        })->with(['kostum.toko'])->get();

        return view('admin.transaksi', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('isAdmin');

        $transaksi = Transaksi::findOrFail($id);

        return view('admin.transaksiedit', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'status' => 'required'
        ]);

        $transaksi->update([
            'status' => $request->status
        ]);

        return redirect('/admin/transaksi')->with('sukses', 'Status telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->authorize('isAdmin');

    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Hapus transaksi
    $transaksi->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/transaksi')->with('sukses', 'Transaksi berhasil dihapus!');
    }
}
