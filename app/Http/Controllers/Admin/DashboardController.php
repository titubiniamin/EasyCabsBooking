<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hub;
use App\Models\ParcelTime;
use App\Repository\Interfaces\BookingInterface;
use App\Repository\Interfaces\MerchantInterface;
use App\services\DashboardService;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Parcel;
use App\Models\Collection;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\PickupRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Rider;
use App\Repository\Interfaces\AdminInterface;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    protected $parcelRepo;
    protected $pickupRepo;
    protected $adminRepo;
    protected $riderRepo;
    protected $merchantRepo;
    protected $areaRepo;

    public function __construct(MerchantInterface $merchantInterface,  BookingInterface $bookingInterface)
    {

        $this->merchantRepo = $merchantInterface;
        $this->bookingRepo = $bookingInterface;
    }

    public function dashboard(DashboardService $service)
    {
        if (\request()->status == 1) {
            $bookings = $this->bookingRepo->allLeastestBooking(1);
        } elseif (\request()->status == 0) {
            $bookings = $this->bookingRepo->allLeastestBooking(0);
        } elseif (\request()->status == 3) {
            $bookings = $this->bookingRepo->allLeastestBooking(3);
//            dd($bookings);
        }
        if (\request()->ajax()) {
            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('merchant_info', function ($bookings) {
                    return '<b>Trasfer: </b>' . $bookings->transfer .
                        '<br><b>Pickup Address:  </b>' . $bookings->pickup_address .
                        '<br><b>Drop off address: </b>' . $bookings->drop_off_address .
                        '<br><b>Drop off address: </b>' . $bookings->drop_off_address .
                        '<br><b>Pickup Date: </b>' . $bookings->pickup_date.
                        '<br><b>No. of Passengers: </b>' . $bookings->no_passengers.
                        '<br><b>Business Name: </b>' . $bookings->business_name.
                        '<br><b>Email: </b>' . $bookings->email.
                        '<br><b>Mobile: </b>' . $bookings->mobile.
                        '<br><b>Vehicle: </b>' . $bookings->vehicle.
                        '<br><b>Trip Type: </b>' . $bookings->trip_type.
                        '<br>' . showStatus($bookings->status);
                })

                ->addColumn('action', function ($bookings) {
                    return view('admin.merchant.info.action-button', compact('bookings'));
                })
                ->rawColumns(['merchant_info', 'enableDisable', 'status', 'action'])
                ->tojson();
        }

        $data = [
            'status' => \request()->status,
            'all' => $this->bookingRepo->countBookingWithCondition(''),
            'pending' => $this->bookingRepo->countBookingWithCondition(['status' => '0']),
            'active' => $this->bookingRepo->countBookingWithCondition(['status' => '1']),
//            'inactive' => $this->merchantRepo->countMerchantWithCondition(['status' => 'inactive']),
        ];
        return view('admin.merchant.info.index', $data);
    }

    public function parcelSummarySearchByHub(Request $request, DashboardService $service)
    {
        if (\request()->ajax()) {
            foreach ($service->countTotalParcel($request) as $key => $total) {
                $data[$key] = $total;
            }
            return response()->view('admin.dashboard.parcel-summary-by-hub', $data);
        }
    }
}
