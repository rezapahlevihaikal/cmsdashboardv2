<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $table = 'performance';

    protected $fillable = 
    [
        'divisi',
        'core_bisnis',
        'target',
        'pencapaian',
        'value',
        'tanggal',
        'bulan',
        'tahun'
    ];

    public $timestamps = false;
}
