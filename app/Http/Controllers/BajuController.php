<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Keterangan;
use App\Models\Baju;
use Illuminate\Http\Request;

class BajuController extends Controller
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

        $toko = Toko::where('id_admin', auth()->user()->id)->get();
        $keterangan = Keterangan::all();
        $baju = Baju::where('id_admin', auth()->user()->id)->get();

        return view('admin.kostum', [
            'toko' => $toko,
            'keterangan' => $keterangan,
            'baju' => $baju,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');

        $toko = Toko::where('id_admin', auth()->user()->id)->get();
        $keterangan = Keterangan::all();

        return view('admin.kostumcreate', [
        'toko' => $toko,
        'kete' => $keterangan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            // 'deskripsi' => 'required|max:255',
            'harga' => 'required|integer|min:0',
            'image' => 'image|file|required',
            'nama_toko' => 'required|max:255',
            'nama_keterangan' => 'required|max:255',
        ]);

        $imagePath = $request->file('image')->store('public/images');


        Baju::create([
            'nama' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'image' => $imagePath,
            'id_toko' => $request->nama_toko,
            'nama_keterangan' => $request->nama_keterangan,
            'id_admin' => auth()->user()->id
        ]);

        return redirect('/admin/produk')->with('sukses', 'Produk baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function show(Baju $baju)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function edit(Baju $baju)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baju $baju)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baju $baju)
    {
        //
    }
}
