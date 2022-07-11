<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventCategory;
use App\Models\StatusEvent;

class Event extends Model
{
    use HasFactory;
    protected $table = 'cal_event';

    protected $fillable = [
        'tanggal',
        'start_time',
        'finish_time',
        'venue',
        'deskripsi',
        'kategori',
        'pic',
        'lastupdate',
        'status',
        'id_kategori',
        'id_pic',
        'id_status',
        'cost',
        'revenue'
    ];

    public function cat()
    {
        return $this->belongsTo('App\Models\EventCategory', 'id_kategori','id');
    }

    public function pic_name()
    {
        return $this->hasMany('App\Models\PicEvent', 'id', 'id_pic', 'divisi');
    }

    public function stat2()
    {
        // return $this->belongsTo('App\Models\StatusEvent', 'id_status', 'id');
        return $this->belongsTo(StatusEvent::class, 'id_status', 'id');
    }

    public $timestamps = false;
}
