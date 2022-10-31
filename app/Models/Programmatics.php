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
        'website',
        'partner_id'
    ];

    public function getWebsite()
    {
        return $this->belongsTo('App\Models\MasterWebsite', 'website', 'id');
    }

    public function getPartner()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'partner_id', 'id');
    }

    public $timestamps = false;
}
