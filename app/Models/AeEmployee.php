<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AeEmployee extends Model
{
    use HasFactory;
    protected $table = 'employee_ae';

    protected $fillable = 
    [
        'name',
        'divisi_id',
        'core_bisnis_id',
        'hiredate',
        'salary'
    ];

    public function getDivisi()
    {
        return $this->belongsTo('App\Models\Divisi', 'divisi_id', 'id');
    }

    public function getCoreBisnis()
    {
        return $this->belongsTo('App\Models\CoreBisnis', 'core_bisnis_id', 'id');
    }

    public $timestamps = false;
}
