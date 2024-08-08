<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'paket_id'];

    public function pakets()
    {
        return $this->belongsTo(Paket::class, 'paket_product', 'product_id', 'paket_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
