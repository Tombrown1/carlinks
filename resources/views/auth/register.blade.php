@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                        <div class="card-body">
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" name="fname" type="text" value="{{old('fname')}}" placeholder="Enter your first name" />
                                            <label for="inputFirstName">First name</label>
                                           
                                        </div> @error('fname')
                                                <p class="alert alert-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" name="lname" type="text" value="{{old('lname')}}" placeholder="Enter your last name" />
                                            <label for="inputLastName">Last name</label>
                                        </div>
                                        @error('lname')
                                            <p class="alert alert-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" name="email" type="email" value="{{old('email')}}" placeholder="Enter your email" />
                                    <label for="inputEmail">Email address</label>
                                    @error('email')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="password" type="password" value="{{old('password')}}"placeholder="Create a password" />
                                            <label for="inputPassword">Password</label>
                                    @error('password')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPasswordConfirm"name="password_confirmation" type="password" value="{{old('password_confirmation')}}" placeholder="Confirm password" />
                                            <label for="inputPasswordConfirm">Confirm Password</label>
                                    @error('password_confirmation')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <!-- <div class="d-grid"><a class="btn btn-primary btn-block" type="submit">Create Account</a></div> -->
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection