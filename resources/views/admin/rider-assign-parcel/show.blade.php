@extends('layouts.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/daterangepicker.css')}}">
@endpush
@section('title', 'Rider Assign Parcel')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('admin.dashboard'),
    'Parcel'=>route('admin.parcel.index'),
    'Rider Assign Parcel'=>''
    ]
    @endphp
    <x-bread-crumb-component title='Rider Assign Parcel' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rider Assign Parcel</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="rider_id">Select Rider</label>

                                        <select class="form-control select2" name="rider_id" id="rider_id" required>
                                            <option value="" disabled selected>Select one</option>
                                            @foreach($riders as $rider)
                                            <option value="{{$rider->id}}">{{$rider->name}} ({{$rider->rider_code}})</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('rider_id'))
                                        <small class="text-danger">{{$errors->first('rider_id')}}</small>
                                        @endif

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="status">Status</label>
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="received_at_office" selected>Received At Office</option>
                                        </select>
                                        @if($errors->has('status'))
                                        <small class="text-danger">{{$errors->first('status')}}</small>
                                        @endif

                                    </div>


                                    <div class="col-md-3 form-group">
                                        <label></label>
                                        <button class="btn btn-primary waves-effect waves-float waves-light form-control" type="button" id="search_button">Search</button>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label></label>
                                        <button class="btn btn-warning waves-effect waves-float waves-light form-control" onclick="window.location.reload()" type="button" id="refresh_button">Refresh</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div id="searchResult"></div>
                </div>
            </div>
        </section>
        <!-- Basic Inputs end -->
    </div>
</div>

@endsection

@push('script')

<script type="text/javascript">
    $(document).ready(function() {

        $('#search_button').on('click', function() {
            var rider_id = $('#rider_id').val();
            var status = $('#status').val();
            if (rider_id == null) {
                alert('Please Select Rider Right Now');
            } else {

                $.ajax({

                    type: "GET",
                    url: "{{ route('admin.rider-assign-parcel-search') }}",
                    data: {
                        rider_id: rider_id,
                        status: status,
                    },
                    success: function(response) {
                        console.log(response);
                        $("#searchResult").html(response);

                    }
                });
            }
        });


    });
</script>
@endpush