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

    public function getMobTop()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_top', 'id');
    }

    public function getMobInArt1()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_in_article1', 'id');
    }

    public function getMobInArt2()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_in_article2', 'id');
    }

    public function getMobInArt3()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_in_article3', 'id');
    }

    public function getStickBot()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_sticky_bottom', 'id');
    }

    public function getMobImage()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_in_imagebanner', 'id');
    }

    public function getMobNative()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_nativead', 'id');
    }

    public function getMobVid()
    {
        return $this->belongsTo('App\Models\MasterPartner', 'mob_video', 'id');
    }

    public $timestamps = false;
}
