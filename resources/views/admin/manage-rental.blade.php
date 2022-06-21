@extends('layouts.app')

@section('title', 'Manage Rental')

@section('content')
<div class="container-fluid py-4">
        <h2 class="mt-4">Manage Rentals</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Rental</li>
            </ol>
            <div class="vehicled mb-4">
                <!-- <div class="vehicled-header">                   
                    Manage vehicles                   
                </div> -->
                 <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#rentvehicle">Rent Vehicle</button>
                <div class="vehicled-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>                                
                                <th>S/N</th>
                                <th>Admin</th>
                                <th>Vehicle</th>
                                <th>Customer</th>
                                <th>Branch</th>
                                <th>Pickup Date</th>
                                <th>Dropoff Date</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentals as $rental)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{App\Models\User::find($rental->user_id)->name}}</td>
                                <td>{{App\Models\Vehicle::find($rental->vehicle_id)->make}}</td>
                                <td>{{App\Models\Customer::find($rental->customer_id)->fname . ' '. App\Models\Customer::find($rental->customer_id)->lname}}</td>
                                <td>{{App\Models\Branch::find($rental->branch_id)->name}}</td>
                                <td>{{$rental->pickup_date}}</td>
                                <td>{{$rental->dropoff_date}}</td>
                                <td><a href="{{route('vehicle.rented', ['id' => $rental->id])}}" class="btn btn-primary">Track Vehicle</a></td>
                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                            </tr>
                                
                            @endforeach
                        </tbody>                       
                    </table>
                </div>                
            </div>
    </div>

    <div class="modal fade modal" id="rentvehicle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rent Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('rent.vehicle')}}" method="post">
                        @csrf
                                <div class="form-floating mb-3">
                                 
                                    <select name="vehicle_id" id="" class="form-control">
                                        <option> Select Vehicle</option>
                                     @foreach($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}">{{$vehicle->make}}</option>
                                      @endforeach   
                                    </select>
                                   
                                    @error('vehicle_id')
                                    <p class="alert alert-success">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    
                                        <select name="customer_id" id="" class="form-control">
                                              <option>Select Customer</option>
                                               @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->fname ." ". $customer->lname}}</option>
                                                @endforeach    
                                        </select>
                                    
                                </div>
                                <div class="form-floating mb-3">                                
                                        <select name="branch_id" id="" class="form-control">
                                            <option>Select Branch</option>
                                            @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                             @endforeach
                                        </select>
                                   
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPUD" type="date" name="pickup_date" placeholder="Pickup Date"/>
                                    <label for="inputPUD">Pickup Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputDOD" type="date" name="dropoff_date" placeholder="Dropoff Date"/>
                                    <label for="inputDOD">Dropoff Date</label>
                                </div>
                                
                                <!-- <div class="form-floating mb-3">
                                    <input class="form-control" id="inputDescription" type="text" name="description" placeholder="Description"/>
                                    <label for="inputDescription">Description</label>
                                </div>                                -->
                           
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit"  class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
                                    
            </div>
        </div>
    </div>
@endsection