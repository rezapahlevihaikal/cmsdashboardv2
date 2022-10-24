<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmatics extends Model
{
    use HasFactory;

    protected $table = 'programmatics';

    protected $fillable = [
        'dataadd',
        'views',
        'clicks',
        'ctr',
        'cpc',
        'cpm',
        'laba',
        'website'
    ];

    public function getWebsite()
    {
        return $this->belongsTo('App\Models\MasterWebsite', 'website', 'id');
    }

    public $timestamps = false;
}
