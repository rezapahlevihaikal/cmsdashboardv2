<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsDeposit extends Model
{
    use HasFactory;

    protected $table = 'ads_deposit';

    protected $fillable = [
        'website',
        'deposit',
        'tanggal_deposit',
        'status',
        'tanggal_habis',
        'sisa_slot'
    ];

    public function getWebsite()
    {
        return $this->belongsTo('App\Models\MasterWebsite', 'website', 'id');
    }
    
    public $timestamps = false;
}
