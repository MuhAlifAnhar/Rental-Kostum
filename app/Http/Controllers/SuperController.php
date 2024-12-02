<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function __construct() {
         // Admin dan Operator bisa mengakses `index` dan `show`
        $this->middleware('can:semuaRole', ['only' => ['indexe']]);
    }

    // function indexe(){
    //     $this->authorize('semuaRole');
    //     return view('admin.index');
    // }

    public function indexe()
    {
        $this->authorize('semuaRole');

        if(Auth::user()->toko == null){
            $data = Toko::withCount([
                'transaksis as total_transactions' => function ($query) {
                    $query->selectRaw("COUNT(*)");
                }
            ])->get();
        }else{
            $userId = Auth::user()->toko->id;

            $transaksi = Transaksi::where('id_toko', $userId) // Atur sesuai relasi
                ->selectRaw("status, COUNT(*) as count")
                ->groupBy('status')
                ->pluck('count', 'status');

            $data = [
                'success' => $transaksi->get('success', 0),
                'pending' => $transaksi->get('pending', 0),
                'failed' => $transaksi->get('failed', 0),
            ];
        }


        // $transactionsByStore = Toko::with('transaksis')->get();
//         $transactionsByStore = Toko::all();

//         foreach ($transactionsByStore as $store) {
//     dd($store);
// }


        // dd($transactionsByStore);



        return view('admin.index', [
                'data' => $data
        ]);
    }
}
