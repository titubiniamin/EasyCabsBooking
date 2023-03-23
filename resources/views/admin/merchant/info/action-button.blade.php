@php

    $actions = [];
    if($bookings->status == 0){
    $actions['pending'] = route('admin.merchant.active', $bookings->id);
    }

    if($bookings->status == 1){
    $actions['completed'] = route('admin.merchant.inactive', $bookings->id);
    }

@endphp

<div class="d-flex align-items-center">
    <x-action-component :actions="$actions" status="{{ $bookings->status }}" />
</div>
