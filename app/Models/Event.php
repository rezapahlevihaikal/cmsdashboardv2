<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status'
    ];

    public $timestamps = false;
}
