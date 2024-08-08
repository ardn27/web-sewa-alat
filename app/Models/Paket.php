<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'pakets';
    protected $fillable = ['nama_paket', 'gambar_paket', 'deskripsi', 'harga'];
    protected $fillie;

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'paket_product', 'paket_id', 'product_id');
    // }

    public function paket_product() {
        return $this->hasMany(PaketProduct::class);
    }
}
