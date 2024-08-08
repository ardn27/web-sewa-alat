<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['nama_product', 'kategori', 'deskripsi', 'harga_sewa', 'gambar',];

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_product', 'product_id', 'paket_id');
    }
}
