<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $guarded = [
        'id'
    ];

    public function kostum()
    {
        return $this->belongsTo(Baju::class, 'id_toko');
    }

    // Model Transaksi
    protected static function booted()
    {
        static::updated(function ($transaksi) {
            // Ambil kostum yang terkait dengan transaksi ini
            $kostum = $transaksi->kostum;

            if ($kostum) {
                // Jika transaksi berhasil, ubah keterangan menjadi "di sewa"
                if ($transaksi->status === 'pending') {
                    $kostum->update(['nama_keterangan' => 2]); // 2 adalah ID untuk "di sewa"
                }
                // Jika status belum berhasil, tetap di "di booking"
                elseif ($transaksi->status === 'success') {
                    $kostum->update(['nama_keterangan' => 1]); // 1 adalah ID untuk "di booking"
                }
                elseif ($transaksi->status === 'failed') {
                    $kostum->update(['nama_keterangan' => 3]); // 1 adalah ID untuk "di booking"
                }
            }
        });
    }

}
