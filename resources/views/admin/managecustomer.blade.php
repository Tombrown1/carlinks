@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')

<div class="container-fluid py-4">
        <h2 class="mt-4">Manage Customers</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Customers</li>
            </ol>
            <div class="vehicled mb-4">
                <!-- <div class="vehicled-header">                   
                    Manage vehicles                   
                </div> -->
                 <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#addveh">Add Customer</button>
                <div class="vehicled-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>                                
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$customer->fname . ' '. $customer->lname}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->gender}}</td>
                                <td><a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcustomer">Edit</a></td>
                                <td><a href="#" class="btn btn-success">View</a></td>
                                <!-- Customer Edit Modal -->
                                <div class="modal fade modal" id="editcustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{route('add.customer')}}" method="post">
                                                @csrf
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputFName" type="text" name="firstname" value="{{$customer->fname}}" />
                                                    <label for="inputLName">First Name</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputLName" type="text" name="lastname" value="{{$customer->lname}}" />
                                                    <label for="inputLName">Last Name</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" type="email" name="email" value="{{$customer->email}}" />
                                                    <label for="inputEmail">Email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputPhone" type="text" name="phone" value="{{$customer->phone}}" />
                                                    <label for="inputPhone">Phone</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <!-- <input class="form-control" id="inputOwner" type="text" name="owner" placeholder="Owner" /> -->                                    
                                                    <select name="gender" id="inputGender" class="form-control">
                                                        <option value="{{$customer->gender}}">{{$customer->gender}}</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    
                                                    </select>
                                                    <label for="inputGender">Select Gender</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputBranch" type="text" name="branch" value="{{$customer->branch_id}}" />
                                                    <label for="inputBranch">Branch</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputStr1" type="text" name="str_1" value="{{App\Models\CustomerAddress::find($customer->id)}}" />
                                                    <label for="inputStr1">Street 1</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputStr2" type="text" name="str_2" placeholder="Street 2" />
                                                    <label for="inputStr2">Street 2</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputCity" type="text" name="city" placeholder="City" />
                                                    <label for="inputCity">City</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputState" type="text" name="state" placeholder="State" />
                                                    <label for="inputState">State</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputZip" type="text" name="zip" placeholder="Zip" />
                                                    <label for="inputZip">Zip Code</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit"  class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.customer')}}" method="post">
                        @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputFName" type="text" name="firstname" placeholder="First Name" />
                                    <label for="inputLName">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputLName" type="text" name="lastname" placeholder="Last Name" />
                                    <label for="inputLName">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Email" />
                                    <label for="inputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPhone" type="text" name="phone" placeholder="Phone" />
                                    <label for="inputPhone">Phone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <!-- <input class="form-control" id="inputOwner" type="text" name="owner" placeholder="Owner" /> -->                                    
                                    <select name="gender" id="inputGender" class="form-control">
                                        <option >Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                       
                                    </select>
                                    <!-- <label for="inputOwner">Select Owner</label> -->
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputBranch" type="text" name="branch" placeholder="Branch" />
                                    <label for="inputBranch">Branch</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputStr1" type="text" name="str_1" placeholder="Street 1" />
                                    <label for="inputStr1">Street 1</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputStr2" type="text" name="str_2" placeholder="Street 2" />
                                    <label for="inputStr2">Street 2</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputCity" type="text" name="city" placeholder="City" />
                                    <label for="inputCity">City</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputState" type="text" name="state" placeholder="State" />
                                    <label for="inputState">State</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputZip" type="text" name="zip" placeholder="Zip" />
                                    <label for="inputZip">Zip Code</label>
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