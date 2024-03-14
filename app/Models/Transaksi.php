<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'id_pelanggan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(Detail_Transaksi::class, 'id_transaksi'); 
    }
}
