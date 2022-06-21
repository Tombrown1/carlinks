@extends('layouts.app')

@section('title', 'Add Car Owner')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add Car Owner</h3></div>
                    <div class="card-body">
                        <form action="{{route('new.owner')}}" method="post">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputName" type="text" name="name" placeholder="Owner Name" />
                                    <label for="inputName">Owner Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Owner Email" />
                                    <label for="inputEmail">Owner Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPhone" type="text" name="phone" placeholder="Phone Number" />
                                   
                                    <label for="inputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="gender" id="inputGender" class="form-control">
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                   
                                    <label for="inputGender">Gender</label>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <!-- <a class="btn btn-primary btn-block"  type="submit">Add Car</a> -->
                                        <button class="btn btn-primary btn-block" type="submit">Add Car</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection