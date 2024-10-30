<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpenjualan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function Penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'nostruk', 'id');
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
