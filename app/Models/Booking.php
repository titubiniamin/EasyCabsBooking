<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=['transfer','pickup_address','drop_off_address','pickup_date','no_passengers','business_name','email','mobile','vehicle','trip_type','driver_instructions','status'];
}
