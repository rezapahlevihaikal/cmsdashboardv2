<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;
use App\Models\CoreBisnis;

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
        'tahun',
        'id_divisi',
        'id_core_bisnis'
    ];

    public function getDivisi()
    {
        return $this->belongsTo('App\Models\Divisi', 'id_divisi', 'id');
    }

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'id_core_bisnis', 'id');
    }

    public $timestamps = false;
}
