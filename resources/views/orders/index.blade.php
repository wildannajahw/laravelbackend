@extends('layouts.app')
@section('title') Orders list @endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif

@if(Auth::user()->roles == "[\"ADMIN\"]" || Auth::user()->roles == "[\"STAFF\"]")
<table class="table table-bordered">
  <thead>
    <tr>
      <th><b>Cover</b></th>
      <th><b>item</b></th>
      <th><b>Customer Name</b></th>
      <th><b>Customer Email</b></th>
      <th><b>Customer Address</b></th>
      <th><b>Price</b></th>
      <th><b>Status</b></th>
      <!-- <th><b>Categories</b></th> -->
      <!-- <th><b>Stock</b></th> -->
      <th><b>Action</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach($pesans as $pesan)
      @if($pesan->staff_id == Auth::user()->id)
    <tr>
      <td>
        @if($pesan->cover)
        <img src="{{asset('storage/' . $pesan->cover)}}" width="96px"/>
        @endif
      </td>
      <td>{{$pesan->title}}</td>
      <td>{{$pesan->user_id}}</td>
      <td>{{$pesan->user_email}}</td>
      <td>{{$pesan->address}}</td>
      <td>{{$pesan->price}}</td>
      <td>
        @if($pesan->status == "SUBMIT")
        <span class="badge bg-warning text-light">{{$pesan->status}}</span>
        @elseif($order->status == "PROCESS")
        <span class="badge bg-info text-light">{{$pesan->status}}</span>
        @elseif($order->status == "FINISH")
        <span class="badge bg-success text-light">{{$pesan->status}}</span>
        @elseif($order->status == "CANCEL")
        <span class="badge bg-dark text-light">{{$pesan->status}}</span>
        @endif
      </td>

      <td>
        <a href="#" class="btn btn-info btn-sm"> Edit</a>
      </td>
    </tr>
      @endif
    @endforeach
  </tbody>
  </table>

@else{
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><b>Cover</b></th>
        <th><b>item</b></th>
        <th><b>Price</b></th>
        <th><b>Status</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach($pesans as $pesan)
        @if($pesan->user_id == Auth::user()->name)
      <tr>
        <td>
          @if($pesan->cover)
          <img src="{{asset('storage/' . $pesan->cover)}}" width="96px"/>
          @endif
        </td>
        <td>{{$pesan->title}}</td>
        <td>{{$pesan->price}}</td>
        <td>
          @if($pesan->status == "SUBMIT")
          <span class="badge bg-warning text-light">{{$pesan->status}}</span>
          @elseif($order->status == "PROCESS")
          <span class="badge bg-info text-light">{{$pesan->status}}</span>
          @elseif($order->status == "FINISH")
          <span class="badge bg-success text-light">{{$pesan->status}}</span>
          @elseif($order->status == "CANCEL")
          <span class="badge bg-dark text-light">{{$pesan->status}}</span>
          @endif
        </td>
        @endif
      @endforeach
    </tbody>
  </table>
@endif
}
@endsection
