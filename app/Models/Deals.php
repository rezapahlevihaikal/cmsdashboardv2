<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;
    protected $table = 'deals';

    protected $fillable = 
    [
        'Name',
        'Team',
        'Owner_Fullname',
        'Owner_Username',
        'Creator_Fullname',
        'Creator_Username',
        'Currency',
        'Size',
        'Cost',
        'Closed_Date',
        'Start_Date',
        'Expired_Date',
        'Pipeline',
        'Stage',
        'Source',
        'Priority',
        'Company',
        'Contacts',
        'Contacts_Email',
        'Contacts_Phone',
        'Products',
        'Lost_Reason',
        'Deal_Status',
        'Created_At_Date',
        'Created_At_Time',
        'Updated_At',
        'Competitor_Product',
        'Related_Outlet',
        'Penerima_Award',
        'Latest_Note_1',
        'Latest_Gps_Checkin_1',
        'Latest_Note_2',
        'Latest_Gps_Checkin_2',
        'Latest_Note_3',
        'Latest_Gps_Checkin_3',
    ];

    public $timestamps = false;
}
