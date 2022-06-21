@extends('layouts.app')

@section('title', 'View Car Record')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4">Car Info </h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('managecar')}}">Manage Car</a></li>
        <li class="breadcrum-item"></li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header text-center">Car information</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">Vehicle Owner</div>
                        <div class="col-md-6">{{App\Models\Owner::find($vehicleinfo->owner_id)->name}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Make</div>
                        <div class="col-md-6">{{$vehicleinfo->make}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Model</div>
                        <div class="col-md-6">{{$vehicleinfo->model}}</div>
                    </div> 
                    <div class="row mb-3">
                        <div class="col-md-6">Odometer</div>
                        <div class="col-md-6">{{$vehicleinfo->odometer}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Vehicle ID No</div>
                        <div class="col-md-6">{{$vehicleinfo->vin}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Available Indicator</div>
                        <div class="col-md-6">{{$vehicleinfo->available_indicator}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Condition Description</div>
                        <div class="col-md-6">{{$vehicleinfo->condition_desc}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection