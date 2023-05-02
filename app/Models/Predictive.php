<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predictive extends Model
{
    use HasFactory;

    protected $table = 'prediktif';

    protected $fillable = 
    [
        'tahun',
        'bulan',
        'tema',
        'value',
        'corebisnis'
    ];

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'corebisnis', 'id');
    }

    public $timestamps = false;
}
