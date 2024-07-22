<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyData extends Model
{
    use HasFactory;

    protected $table = 'society_datas';

    protected $fillable = [
        'address',
        'email',
        'gst_no',
        'pt_no',
        'pan_no',
        'tan_no',
        'city',
        'state',
        'pincode',
        // 'img',
        'registration_number',
        'db_name',
        'db_username',
        'db_password',
        'mobile_no',
        'society_id'
    ];

    
}
