<?php

use App\Models\Merchant;
use App\Models\Collection;
use App\Models\DeliveryCharge;
use Illuminate\Support\Facades\DB;

function bladeIcon($type)
{
    switch ($type) {
        case 'add':
            echo '<i class="fas fa-plus"></i>';
            break;
        case 'show':
            echo '<i class="fas fa-eye"></i>';
            break;
        case 'edit':
            echo '<i class="fas fa-edit"></i>';
            break;
        case 'delete':
            echo '<i class="fas fa-trash"></i>';
            break;
        case 'active':
            echo '<i class="fas fa-thumbs-up"></i>';
            break;
        case 'inactive':
            echo '<i class="fas fa-thumbs-down"></i>';
            break;
        case 'print':
            echo '<i class="icon fa fa-print"></i>';
            break;
        case 'approve':
        case 'accept':
            echo '<i class="fas fa-check-circle"></i>';
            break;
        case 'deliver':
            echo '<i class="fas fa-check-square"></i>';
            break;
        case 'hold':
            echo '<i class="fas fa-pause"></i>';
            break;
        case 'cancel':
            echo '<i class="far fa-window-close"></i>';
            break;
        case 'picked':
            echo '<i class="fas fa-people-carry"></i>';
            break;
    }
}

//function successRedirect($message, $route){
//    Toastr::success($message);
//    return redirect()->route($route);
//}
//
//function failureRedirect($message, $route){
//    Toastr::error($message);
//    return redirect()->route($route);
//}
//
function showStatus($status)
{
    switch ($status) {
        case 1:
            return '<div class="badge badge-success">' . ucfirst('completed') . '</div>';
        case 0:
            return '<div class="badge badge-danger">' . ucfirst('pending') . '</div>';
        case 'accepted':
        case 'active':
        case 'delivered':
            return '<div class="badge badge-success">' . ucfirst($status) . '</div>';
        case 'return':
            return '<div class="badge badge-light-danger">' . ucfirst($status) . '</div>';
        case 'cancelled':
            return '<div class="badge badge-glow badge-danger">' . ucfirst($status) . '</div>';
        case 'inactive':
            return '<div class="badge badge-danger">' . ucfirst($status) . '</div>';
        case 'pending':
            return '<div class="badge badge-warning">Pending</div>';
        case 'hold':
            return '<div class="badge badge-light-warning">Hold</div>';
        case 'enable':
            return '<div class="badge badge-glow badge-success">Enable</div>';
        case 'disable':
            return '<div class="badge badge-glow badge-warning">Disable</div>';
        case 'transit':
            return '<div class="badge badge-glow badge-info">Transit</div>';
        case 'partial':
            return '<div class="badge badge-pill badge-glow badge-primary">Partial Collection</div>';
        case 'wait_for_pickup':
            return '<div class="badge badge-pill badge-glow badge-warning">Wait for Pickup</div>';
    }
}
function deliveryCodCharge($city_type_id, $weight_range_id, $merchant_id)
{

    $merchant_delivery_cod = DeliveryCharge::where('city_type_id', $city_type_id)
        ->where('weight_range_id', $weight_range_id)
        ->where('merchant_id', $merchant_id)
        ->where('is_global', 'no')
        ->first();
    $global_delivery_cod = DeliveryCharge::where('city_type_id', $city_type_id)
        ->where('weight_range_id', $weight_range_id)
        ->where('merchant_id', NULL)
        ->where('is_global', 'yes')
        ->first();

    if (isset($merchant_delivery_cod)) {
        $delivery_cod =  $merchant_delivery_cod;
    }
    else {
        $delivery_cod =  $global_delivery_cod;
    }

    return $delivery_cod;
}
function getPrefix($merchant_id)
{
    $merchant = Merchant::where('id', $merchant_id)->first();
    $prefix = $merchant->prefix ?? 'PS';
    return $prefix;
}
function getDue($merchant_id)
{
    $dueList = DB::table('collections')
        ->where('merchant_id', $merchant_id)
        ->orderBy('id', 'desc')
        ->sum('net_payable');
    return $dueList;
}
//Api Function
function send_error($message, $errors = [], $code = 404)
{
    $response = [
        'status' => false,
        'message' => $message
    ];
    !empty($errors) ? $response['errors'] = $errors : null;
    return response()->json($response, $code);
}
function send_response($message, $data = [], $code)
{
    $response = [
        'status' => true,
        'message' => $message,
        'data' => $data
    ];
    return response()->json($response, $code);
}
