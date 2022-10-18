<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;

    protected $table = 'followers';

    protected $fillable = 
    [
        'socmed_id',
        'sub_socmed_id',
        'value'
    ];

    public function getSocmed()
    {
        return $this->belongsTo('App\Models\SocMed', 'socmed_id', 'id');
    }

    public function getSubSocmed()
    {
        return $this->belongsTo('App\Models\SubSocMed', 'sub_socmed_id', 'id');
    }
}
