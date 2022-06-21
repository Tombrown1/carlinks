@extends('layouts.app')

@section('title', 'Vehicle Rented')

@section('content')

<div class="container-fluid py-4">
    <h4 class="mb-4">Vehicle Hire Details </h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('manage.rental')}}">Manage Vehicle Rentage</a></li>
        <li class="breadcrum-item"></li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header text-center">Renting Info</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">Customer Name</div>
                        <div class="col-md-6">{{App\Models\Customer::find($rental->customer_id)->fname . ' '. App\Models\Customer::find($rental->customer_id)->lname}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Vehicle</div>
                        <div class="col-md-6">{{App\Models\Vehicle::find($rental->vehicle_id)->make}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Pickup Date</div>
                        <div class="col-md-6">{{$rental->pickup_date}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">DropoffDate</div>
                        <div class="col-md-6">{{$rental->dropoff_date}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Branch</div>
                        <div class="col-md-6">{{App\Models\Branch::find($rental->branch_id)->name}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Address</div>
                        <div class="col-md-6">{{App\Models\Address::find($rental->customer_id)->str_1}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Phone</div>
                        <div class="col-md-6">{{App\Models\Customer::find($rental->customer_id)->phone}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Vehicle ID No</div>
                        <div class="col-md-6">{{App\Models\Vehicle::find($rental->vehicle_id)->vin}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">inputDescription</div>
                        <div class="col-md-6">{{App\Models\Vehicle::find($rental->vehicle_id)->condition_desc}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection