<?php

namespace App\Repository\Repos;

use App\Models\Booking;
use App\Repository\Interfaces\BookingInterface;

class BookingRepo implements BookingInterface
{
    public function allLeastestBooking($status = 3){
        if($status == 0){
            return Booking::where(['status'=>0])->latest();
        }else if($status == 1){
            return Booking::where(['status'=>1])->latest();
        }else{
           return Booking::all();
        }
    }

    public function countBookingWithCondition($condition = ''){
        if($condition == ''){

            return Booking::count();
        }else{
            return Booking::where($condition)->count();
        }
    }

    public function getAnInstance($bookingId){
        return Booking::findOrFail($bookingId);
    }

    public function statusChange($bookingData, $status){
        return $bookingData->update([
            'status'=>$status,
        ]);
    }

}
