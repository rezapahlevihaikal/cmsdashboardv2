<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSocMed extends Model
{
    use HasFactory;

    protected $table = 'sub_soc_meds';

    protected $fillable = [
        'name',
        'socmed_id'
    ];

    public function getSocMed()
    {
        return $this->belongsTo('App\Models\SocMed', 'socmed_id', 'id');
    }
}
