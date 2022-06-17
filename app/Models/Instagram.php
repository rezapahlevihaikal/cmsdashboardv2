<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = 'instagram_ranks';
    use HasFactory;
    protected $fillable = 
    [
        'ig_we_rank',
        'ig_hs_rank',
        'ig_populis_rank',
        'ig_konten_jatim_rank',
        'ig_we_nilai',
        'ig_hs_nilai',
        'ig_populis_nilai',
        'ig_konten_jatim_nilai'     
    ];
}
