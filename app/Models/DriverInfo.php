<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverInfo extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_driver_info'; 
    protected $fillable = [
        'firstname',
        'lastname',
        'name',
        'phone',
        'email',
        'password',
        'usertype',
        'status',
        'google_id',
        'profile_photo_path',
        'dlcodes'
    ];
}
