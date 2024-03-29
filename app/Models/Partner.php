<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'partners';

    protected $fillable = [
        'nama_partner'
    ];
}
