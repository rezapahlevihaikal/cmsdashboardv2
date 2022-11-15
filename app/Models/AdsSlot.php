<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsSlot extends Model
{
    use HasFactory;

    protected $table = "ads_slot_partner";

    protected $fillable = [
        'website_id',
        'mob_top',
        'mob_in_article1',
        'mob_in_article2',
        'mob_in_article3',
        'mob_sticky_bottom',
        'mob_in_imagebanner',
        'mob_nativead',
        'mob_video'
    ];

    public function getWebsite()
    {
        return $this->belongsTo('App\Models\MasterWebsite', 'website_id', 'id');
    }

    public function getPartner()
    {
        return $this->belongsTo(
            'App\Models\MasterPartner',
            'mob_top', 
            // 'mob_in_article1', 
            // 'mob_in_article2', 
            // 'mob_in_article3',
            // 'mob_sticky_bottom',
            // 'mob_in_imagebanner',
            // 'mob_nativead',
            // 'mob_video',
            'id');
    }

    public $timestamps = false;
}
