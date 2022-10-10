<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'web_rank';

    protected $fillable = [
        'tanggal',
        'we', 
        'hs', 
        'populis', 
        'konten_jatim',
        'news_worthy',
        'we_finance',
        'lastupdate',
        'we_tv', 
        'we_nilai',
        'hs_nilai',
        'populis_nilai',
        'konten_jatim_nilai',
        'tv_nilai'
    ];

    public $timestamps = false;
}
