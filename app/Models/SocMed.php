<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocMed extends Model
{
    use HasFactory;

    protected $table = 'soc_meds';

    protected $fillable = [
        'name'
    ];
}
