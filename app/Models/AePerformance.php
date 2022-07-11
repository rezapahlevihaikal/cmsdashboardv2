<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AePerformance extends Model
{
    use HasFactory;
    protected $table = 'performance_ae';

    protected $fillable = 
    [
        'employee_id',
        'target',
        'pencapaian',
        'bulan',
        'tahun'
    ];

    public function getEmployee()
    {
        return $this->belongsTo('App\Models\AeEmployee', 'employee_id', 'id');
    }

    public $timestamps = false;
}
