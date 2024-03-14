<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function transaksi()
        {
            return $this->belongsTo(Transaksi::class, 'id_transaksi');
        }
        public function product()
        {
            return $this->belongsTo(Product::class, 'id_product');
        }
}
