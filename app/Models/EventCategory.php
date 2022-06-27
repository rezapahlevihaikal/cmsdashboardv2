<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;
    protected $table = 'eventCategory';
    protected $fillable = [
        'id',
        'nama_kategori'
    ];

    
}
