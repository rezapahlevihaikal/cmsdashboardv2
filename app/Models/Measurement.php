<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $table = "master_pengukuran";
    protected $fillable = 
    [
        'masa_kerja',
        'salary',
        'target',
        'id_core_bisnis'
    ];

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'id_core_bisnis', 'id');
    }

    public $timestamps = false;
}
