@extends('layouts.app')

@section('content')

@if(session('status'))
  <div class="alert alert-success">
  {{session('status')}}
  </div>
@endif
<div class="container-fluid" id="regist">
    <div class="row">
        <div class="col-sm-12 ">
            <h3>SIGN UP</h3>

            <h4>Membership registration is required to receive your free HolyShirt</h4>
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group d-flex justify-content-center">
                    <input type="text" name="name" id="name" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" value="{{old('name')}}" required autofocus>
                    <div class="invalid-feedback">
                      {{$errors->first('name')}}
                    </div>
                    <br>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="text" name="username" id="username" placeholder="username" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" value="{{old('username')}}">
                    <div class="invalid-feedback">
                      {{$errors->first('username')}}
                    </div>
                    <br>
                </div>


                <input class="{{$errors->first('roles') ? "is-invalid" : ""}}" type="hidden" checked name="roles[]" id="CUSTOMER" value="CUSTOMER">

                <!-- <input type="checkbox" name="roles[]" value="ADMIN" id="ADMIN" class="{{$errors->first('roles') ? "is-invalid" : ""}}">
                <label for="ADMIN">Administrator</label>
                <input type="checkbox" name="roles[]" value="STAFF" id="STAFF" class="{{$errors->first('roles') ? "is-invalid" : ""}}">
                <label for="STAFF">Staff</label>
                <input type="checkbox" name="roles[]" value="CUSTOMER" id="CUSTOMER" class="{{$errors->first('roles') ? "is-invalid" : ""}}">
                <label for="CUSTOMER">Customer</label>
                <div class="invalid-feedback">
                  {{$errors->first('roles')}}
                </div>
                <br> -->
                <div class="form-group d-flex justify-content-center">
                  <input type="text" name="phone" placeholder="Phone Number" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" id="phone" value="{{old('phone')}}">
                  <div class="invalid-feedback">
                    {{$errors->first('phone')}}
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input type="text" name="address" placeholder="Address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}" id="address">
                  <div class="invalid-feedback">
                    {{$errors->first('address')}}
                  </div>
                  <br>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input type="file" name="avatar" id="avatar" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}" value="asd">
                  <div class="invalid-feedback">
                    {{$errors->first('avatar')}}
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="text" name="email" id="email" placeholder="email" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" value="{{old('email')}}" >
                    <div class="invalid-feedback">
                      {{$errors->first('email')}}
                    </div>
                    <br>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control {{$errors->first('password') ? "is-invalid" : ""}}">
                    <div class="invalid-feedback">
                      {{$errors->first('password')}}
                    </div>
                    <br>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input id="password_confirmation" type="password" class="form-control {{$errors->first('password_confirmation')? "is-invalid" : ""}}" name="password_confirmation" placeholder="Confirm Password">
                    <div class="invalid-feedback">
                      {{$errors->first('password_confirmation')}}
                    </div>
                    <br>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <h4>Already have an account? <a href="/login" style="color:#202020">Login Here</a></h4>
        </div>
    </div>
</div>

@endsection
