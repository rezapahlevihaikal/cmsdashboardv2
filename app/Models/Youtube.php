<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table = 'youtube_ranks';
    use HasFactory;
    protected $fillable = 
    [
        'yt_we_rank',
        'yt_hs_rank',
        'yt_populis_rank',
        'yt_konten_jatim_rank',
        'yt_we_nilai',
        'yt_hs_nilai',
        'yt_populis_nilai',
        'yt_konten_jatim_nilai'    
    ];
}
