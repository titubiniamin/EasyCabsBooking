<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\MerchantRequest;
use App\Models\Merchant;
use App\Repository\Interfaces\BookingInterface;
use App\Repository\Interfaces\MerchantInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MerchantController extends Controller
{
    protected $merchantRepo;
    protected $parcelRepo;
    protected $bookingRepo;

    public function __construct( MerchantInterface $merchantInterface, BookingInterface $bookingInterface)
    {
        $this->merchantRepo = $merchantInterface;
        $this->bookingRepo = $bookingInterface;
    }

    protected function merchantStatus($status)
    {
    }

    public function update2(){
        echo 'test';
    }

    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merchant.info.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt('12345678');
        $data['status'] = 'active';
        $data['isActive'] = 1;
        $data['created_by'] = auth('admin')->user()->id;
        $data['hub_id'] = auth('admin')->user()->hub_id ?? 1;
        $this->merchantRepo->createMerchant($data);
        Toastr::success('New merchant added successfully!.', '', ["progressBar" => true]);
        return redirect()->route('admin.merchant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Merchant $merchant
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $data['merchant'] = $this->merchantRepo->merchantDetailsInstance($id);
        return view('admin.merchant.info.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'merchant' => $this->merchantRepo->getAnInstance($id),
        ];

        return view('admin.merchant.info.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MerchantRequest $request
     * @param Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantRequest $request, Merchant $merchant)
    {
        $this->merchantRepo->updateMerchant($request->validated(), $merchant);
        return response()->successRedirect('Info updated !', 'admin.merchant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->merchantRepo->deleteMerchant($id);
        Toastr::success('Merchant Information deleted Successfully!.', '', ["progressBar" => true]);
        return redirect()->route('admin.merchant.index');
    }

    public function pending($id)
    {
        $merchant = $this->merchantRepo->getAnInstance($id);
        $this->merchantRepo->statusChange($merchant, 'active', '1');
        Toastr::success('Merchant Approved Successfully!.', '', ["progressBar" => true]);
        return redirect()->route('admin.merchant.index');
    }

    public function active($id)
    {
        $booking = $this->bookingRepo->getAnInstance($id);
        $this->bookingRepo->statusChange($booking, 1 );
        Toastr::success('Booking Active Successfully!.', '', ["progressBar" => true]);
        return redirect()->route('admin.merchant.index');
    }

    public function inactive($id)
    {
        $booking = $this->bookingRepo->getAnInstance($id);
        $this->bookingRepo->statusChange($booking, 0);
        Toastr::success('Merchant InActivated Successfully!.', '', ["progressBar" => true]);
        return redirect()->route('admin.merchant.index');
    }

    public function login($merchantId)
    {
        $data['merchant'] = \auth('merchant')->loginUsingId($merchantId);
        session(['loggedIn-from-admin' => true]);
        return redirect()->route('merchant.dashboard');
    }
}
