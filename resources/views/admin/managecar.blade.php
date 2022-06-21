@extends('layouts.app')

@section('title', 'Manage vehicles')

@section('content')
    <div class="container-fluid py-4">
        <h2 class="mt-4">Manage vehicles</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage vehicles</li>
            </ol>
            <div class="vehicled mb-4">
                <!-- <div class="vehicled-header">                   
                    Manage vehicles                   
                </div> -->
                 <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#addveh">Add Vehicle</button>
                <div class="vehicled-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>                                
                                <th>S/N</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Vehicle ID No</th>
                                <th>Odometer</th>
                                <th>Owner</th>
                                <th>Description</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$vehicle->make}}</td>
                                <td>{{$vehicle->model}}</td>
                                <td>{{$vehicle->year}}</td>
                                <td>{{$vehicle->vin}}</td>
                                <td>{{$vehicle->odometer}}</td>
                                <td>
                                    {{App\Models\Owner::find($vehicle->owner_id)->name}}

                                </td>
                                <td>{{$vehicle->condition_desc}}</td>                                
                                <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editvehicle{{$vehicle->id}}"  >Edit</a></td>
                                <td><a href="{{route('single.vehicle', ['id' => $vehicle->id])}}" type="button" class="btn btn-success">View</a></td>
                            </tr>
                             <!-- The  Modal For Edit Announcement-->
                             <div class="modal fade modal-md" id="editvehicle{{$vehicle->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit vehicle Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('edit.vehicle', ['id' => $vehicle->id])}}" method="post">
                                    @csrf
                           
                                    <div class="form-floating mb-3">
                                    <input class="form-control" id="inputVIN" type="text" name="vin" value="{{$vehicle->vin}}" />
                                    <label for="inputVIN">Vehicle Identification Number</label>
                                    @error('vin')
                                        <p class="alert alert-success">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputIndicator" type="text" name="available_indicator" value="{{$vehicle->available_indicator}}" />
                                    <label for="inputModelIndicator">Available Indicator</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputOdometer" type="number" name="odometer" value="{{$vehicle->odometer}}" />
                                    <label for="inputOdometer">Odometer</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputMake" type="text" name="make" value="{{$vehicle->make}}" />
                                    <label for="inputMake">Make</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputOdometer" type="text" name="model" value="{{$vehicle->model}}" />
                                    <label for="inputModel">Model</label>
                                </div> 
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputYear" type="text" name="year" value="{{$vehicle->year}}" />
                                    <label for="inputYear">Year</label>
                                </div>
                                 <div class="form-floating mb-3">
                                    <textarea name="condition_desc" class="form-control" id="inputDesc" cols="7" rows="3">{{$vehicle->condition_desc}}
                                    </textarea>
                                    <label for="inputDesc">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <!-- <input class="form-control" id="inputOwner" type="text" name="owner" placeholder="Owner" /> -->                                    
                                    <select name="owner_id" id="inputOwner" class="form-control">
                                        <option value="{{$vehicle->owner_id}}">{{App\Models\Owner::find($vehicle->owner_id)->name}}</option>
                                        @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                        @endforeach   
                                    </select>
                                    <label for="inputOwner">Select Owner</label>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit"  class="btn btn-primary">Save changes</button>
                                    </div>
                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
         <!-- End Edit Announcement model popup begins here -->         
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
    </div>

    <div class="modal fade modal" id="addveh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.vehicle')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                                    <input class="form-control" id="inputVIN" type="text" name="vin" placeholder="Vehicle Identification Number" />
                                    <label for="inputVIN">Vehicle Identification Number</label>
                                    @error('vin')
                                        <p class="alert alert-success">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputIndicator" type="text" name="available_indicator" placeholder="Available Indicator" />
                                    <label for="inputModelIndicator">Available Indicator</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputOdometer" type="number" name="odometer" placeholder="Odometer" />
                                    <label for="inputOdometer">Odometer</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputMake" type="text" name="make" placeholder="Make" />
                                    <label for="inputMake">Make</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputOdometer" type="text" name="model" placeholder="Model" />
                                    <label for="inputModel">Model</label>
                                </div> 
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputYear" type="text" name="year" placeholder="Year" />
                                    <label for="inputYear">Year</label>
                                </div>
                                 <div class="form-floating mb-3">
                                    <textarea name="condition_desc" class="form-control" id="inputDesc" cols="7" rows="3">

                                    </textarea>
                                    <label for="inputDesc">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <!-- <input class="form-control" id="inputOwner" type="text" name="owner" placeholder="Owner" /> -->                                    
                                    <select name="owner_id" id="inputOwner" class="form-control">
                                        <option value="">Assign owner</option>
                                        @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <label for="inputOwner">Select Owner</label> -->
                                </div>
                           
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