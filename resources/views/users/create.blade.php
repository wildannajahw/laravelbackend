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
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="text" name="username" id="username" placeholder="username" class="form-control">
                </div>

                <input type="checkbox" name="roles[]" value="ADMIN" id="ADMIN">
                <label for="ADMIN">Administrator</label>
                <input type="checkbox" name="roles[]" value="STAFF" id="STAFF">
                <label for="STAFF">Staff</label>
                <input type="checkbox" name="roles[]" value="CUSTOMER" id="CUSTOMER">
                <label for="CUSTOMER">Customer</label>
                <div class="form-group d-flex justify-content-center">
                  <input type="text" name="phone" placeholder="Phone Number" class="form-control" id="phone">
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input type="text" name="address" placeholder="Address" class="form-control" id="address">
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input type="file" name="avatar" id="avatar" class="form-control" value="asd">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="text" name="email" id="email" placeholder="email" class="form-control">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <h4>Already have an account? <a href="/login" style="color:#202020">Login Here</a></h4>
        </div>
    </div>
</div>

@endsection
