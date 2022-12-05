<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBisnis extends Model
{
    use HasFactory;

    protected $table = 'product_bisnis';

    protected $fillable = 
    [
        'kategori_id',
        'nama_product',
        'keterangan'
    ];

    public function getKategori()
    {
        return $this->belongsTo('App\Models\KategoriBisnis', 'kategori_id', 'id');
    }
}
