<?php

namespace App\Repository\Interfaces;

interface BookingInterface
{
    public function allLeastestBooking($status);
    public function countBookingWithCondition($condition);
    public function getAnInstance($bookingId);
    public function statusChange($merchantData, $status);


}
