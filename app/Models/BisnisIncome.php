<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisIncome extends Model
{
    use HasFactory;

    protected $table = 'bisnis_income';

    protected $fillable = [
        'core_bisnis_id',
        'sub_domain',
        'pendapatan',
        'bulan',
        'tahun',
        'description'
    ];

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'core_bisnis_id', 'id');
    }
}
