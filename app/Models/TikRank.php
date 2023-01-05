<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TikRank extends Model
{
    use HasFactory;

    protected $table = 'ranks_tiktok';
    protected $fillable = [
        'dataadd',
        'website_id',
        'rank'
    ];

    public function getWebsite()
    {
        return $this->belongsTo('App\Models\MasterWebsite', 'website_id', 'id');
    }
}
