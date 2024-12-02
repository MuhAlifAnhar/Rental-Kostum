<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Transaksi;

class AdminController extends Controller
{
    public function __construct() {
         // Admin dan Operator bisa mengakses `index` dan `show`
        $this->middleware('can:semuaRole', ['only' => ['indexe']]);
    }

    public function indexe()
    {
        $this->authorize('semuaRole');
        $userId = auth()->user()->id; // Sesuaikan jika ada relasi ke toko
        $transaksi = Transaksi::where('id_toko', $userId) // Atur sesuai relasi
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy('status')
            ->pluck('count', 'status');

        $data = [
            'success' => $transaksi->get('success', 0),
            'pending' => $transaksi->get('pending', 0),
            'failed' => $transaksi->get('failed', 0),
        ];

        return view('admin.index', compact('data'));
    }

}
