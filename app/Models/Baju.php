<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    use HasFactory;

    protected $table = "kostum";

    protected $guarded = [
        'id'
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'nama_keterangan');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_toko');
    }
}
