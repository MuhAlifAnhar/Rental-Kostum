<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = "toko";
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_admin'); // 'id_admin' adalah foreign key di tabel toko
    }

    public function baju()
    {
        return $this->hasMany(Baju::class, 'id_toko');
    }

    public function transaksis()
    {
        return $this->hasManyThrough(
            Transaksi::class,  // Model tujuan akhir
            Baju::class,       // Model perantara
            'id_toko',         // Foreign key pada tabel `bajus` (menuju `tokos`)
            'id_toko',         // Foreign key pada tabel `transaksis` (menuju `bajus`)
            'id',              // Local key pada tabel `tokos`
            'id'               // Local key pada tabel `bajus`
        );
    }
}
