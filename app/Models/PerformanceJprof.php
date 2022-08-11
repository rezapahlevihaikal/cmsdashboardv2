<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceJprof extends Model
{
    use HasFactory;

    protected $table = 'performance_jprof';

    protected $fillable =
    [
        'produk',
        'instansi',
        'pencapaian',
        'id_core_bisnis',
        'bulan',
        'tahun'
    ];

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnisJprof', 'id_core_bisnis', 'id');
    }
}
