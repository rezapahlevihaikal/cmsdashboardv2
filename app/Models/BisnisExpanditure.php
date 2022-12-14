<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisExpanditure extends Model
{
    use HasFactory;

    protected $table = 'bisnis_expanditure';

    protected $fillable = [
        'core_bisnis_id',
        'sub_domain',
        'bulan',
        'tahun',
        'kategori_id',
        'nominal',
        'keterangan'
    ];

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'core_bisnis_id', 'id');
    }

    public function getKategori()
    {
        return $this->belongsTo('App\Models\MasterExpanditure', 'kategori_id', 'id');
    }
}
