<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRival extends Model
{
    use HasFactory;

    protected $table = 'master_rivals';

    protected $fillable = [
        'rivalities_id',
        'value'
    ];

    public function getRival()
    {
        return $this->belongsTo('App\Models\Rivalities', 'rivalities_id', 'id');
    }
}
