<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = 
    [
        'First_Name',
        'Last_Name',
        'Owner_Name',
        'Owner_Username',
        'Team',
        'Creator_Name',
        'Creator_Username',
        'Job_Title',
        'Contact_Email',
        'Phone_Number',
        'Status',
        'Address',
        'City',
        'Province',
        'Country',
        'Zipcode',
        'Date_Of_Birth',
        'Source',
        'Avg_Annual_Income',
        'Company_Name',
        'Company_Website',
        'Deal',
        'Created_At_Date',
        'Created_At_Time',
        'Updated_At',
        'Customer'
    ];

    public $timestamps = false;
}
