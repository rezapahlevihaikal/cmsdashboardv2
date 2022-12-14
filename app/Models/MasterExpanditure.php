<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterExpanditure extends Model
{
    use HasFactory;

    protected $table = 'mst_expanditure';

    protected $fillable = [
        'kategori',
        'name'
    ];
}
