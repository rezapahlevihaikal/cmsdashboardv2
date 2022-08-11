<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreBisnisJprof extends Model
{
    use HasFactory;

    protected $table = 'core_bisnis_jprof';

    protected $fillable = [
        'nama_core_jprof'
    ];
}
