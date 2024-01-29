<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rider_orders extends Model
{
    use HasFactory;
    protected $table = 'client_orders';
     protected $fillable = ['rider_contact', 'rider_id','client_id','pickup_location','pickup_contact',
    'pickup_contact_name','dropoff_contact_name','dropoff_location','dropoff_contact','payment_type','amount','package_type',
    'duration','distance','delivery_status','order_code','treat_status','customer_rider_id'];
}
