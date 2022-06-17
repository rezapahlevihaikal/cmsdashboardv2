<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = 
    [
        'name',
        'owner_name',
        'owner_username',
        'team',
        'creator_name',
        'creator_username',
        'website',
        'phone_number',
        'address',
        'city',
        'province',
        'country',
        'zipcode',
        'type',
        'employees_number',
        'source',
        'annual_revenue',
        'deal',
        'contact',
        'industry',
        'bussiness_registration_number',
        'parent_company',
        'created_at_date',
        'created_at_time',
        'updated_at',
        'nama_dirut',
        'latest_note1',
        'latest_note2',
        'latest_note3'
    ];

    public $timestamps = false;
}
