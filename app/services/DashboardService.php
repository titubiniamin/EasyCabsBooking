<?php

namespace App\services;

use App\Models\Collection;
use App\Models\Parcel;
use App\Repository\Interfaces\AdminInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    protected $adminRepo;


    public function __construct(AdminInterface $admin)
    {


        $this->adminRepo = $admin;

    }

    public function countTotalParcel($requestData = [])
    {
        if(empty($requestData)){
            $total = $this->parcelRepo->parcelCountInDifferentStatus('');
//            return 'ok';
        }else{
//            return $requestData->hub_id;
            $total = $this->parcelRepo->parcelCountInDifferentStatus(['hub_id'=>$requestData['hub_id']]);
        }
        $waitForPickup = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'wait_for_pickup']);
        $receivedAtOffice = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'received_at_office']);
        $pending = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'pending']);
        $transit = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'transit']);
        $delivered = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'delivered']);
        $partial = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'partial']);
        $hold = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'hold']);
        $cancelled = $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'cancelled']) + $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'cancel_accept_by_incharge']) + $this->parcelRepo->parcelCountInDifferentStatus(['status' => 'cancel_accept_by_merchant']);

        return [
            'total' => $total,
            'waitForPickup' => $waitForPickup,
            'receivedAtOffice' => $receivedAtOffice,
            'pending' => $pending,
            'transit' => $transit,
            'delivered' => $delivered,
            'partial' => $partial,
            'cancelled' => $cancelled,
            'hold' => $hold,

            'waitForPickupPercent' => $total>0? number_format(($waitForPickup * 100) / $total, 2):0,
            'receivedAtOfficePercent' => $total>0? number_format(($receivedAtOffice * 100) / $total, 2):0,
            'pendingPercent' => $total>0?number_format(($pending * 100) / $total, 2):0,
            'transitPercent' => $total>0?number_format(($transit * 100) / $total, 2):0,
            'deliveredPercent' => $total>0?number_format(($delivered * 100) / $total, 2):0,
            'partialPercent' => $total>0?number_format(($partial * 100) / $total, 2):0,
            'cancelledPercent' => $total>0?number_format(($cancelled * 100) / $total, 2):0,
            'holdPercent' => $total>0?number_format(($hold * 100) / $total, 2):0,
        ];
    }


}
