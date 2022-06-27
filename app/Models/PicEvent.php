<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicEvent extends Model
{
    use HasFactory;
    protected $table = 'pic_event';
    protected $fillable = 
    [
        'id',
        'nama_pic',
        'divisi'
    ];
}
