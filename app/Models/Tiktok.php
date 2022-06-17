<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiktok extends Model
{
    protected $table = 'tiktok_ranks';
    use HasFactory;
    protected $fillable = 
    [
        'tiktok_we_rank',
        'tiktok_hs_rank',
        'tiktok_populis_rank',
        'tiktok_konten_jatim_rank',
        'tiktok_we_nilai',
        'tiktok_hs_nilai',
        'tiktok_populis_nilai',
        'tiktok_konten_jatim_nilai'     
    ];
}
