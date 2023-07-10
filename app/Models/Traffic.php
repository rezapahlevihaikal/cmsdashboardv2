<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    use HasFactory;

    protected $table = 'traffic';

    protected $fillable = [
        'website_id',
        'tanggal',
        'pageview',
        'user'
    ];

    public function getWebsite(){
        return $this->belongsTo('App\Models\MasterWebsite', 'website_id', 'id');
    }
}
