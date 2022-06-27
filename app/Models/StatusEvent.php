<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusEvent extends Model
{
    use HasFactory;
    protected $table = 'status_event';
    
    protected $fillable = 
    [
        'id',
        'nama_status'
    ];
}
