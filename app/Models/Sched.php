<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sched extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_sched'; 
    protected $fillable = [
        'route_name',
        'status',
        'order_id',
        'contact_person',
        'shipping_address',
        'vehicle_type',
        'first_name',
        'last_name',
        'shipment_date',
    ];
}
