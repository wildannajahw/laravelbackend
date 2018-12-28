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
      <td><a href="{{route('users.show', ['id' => $pesan->user_id])}}" class="btn btn-primary btn-sm" style="text-decoration: none">{{$pesan->user_name}}</a></td>
      <td>{{$pesan->user_email}}</td>
      <td>{{$pesan->address}}</td>
      <td>{{$pesan->price}}</td>
      <td>
        @if($pesan->status == "SUBMIT")
        <span class="badge bg-warning text-light">{{$pesan->status}}</span>
        @elseif($pesan->status == "PROCESS")
        <span class="badge bg-info text-light">{{$pesan->status}}</span>
        @elseif($pesan->status == "FINISH")
        <span class="badge bg-success text-light">{{$pesan->status}}</span>
        @elseif($pesan->status == "CANCEL")
        <span class="badge bg-dark text-light">{{$pesan->status}}</span>
        @endif
      </td>

      <td>
        <form action="{{route('products.proses', ['id' => $pesan->id ])}}" method="POST" enctype="multipart/form-data" class="">
          @csrf
          <button type="submit" class="btn-sm">Process</button>
        </form>
        <br>
        <form action="{{route('products.finish', ['id' => $pesan->id ])}}" method="POST" enctype="multipart/form-data" class="">
          @csrf
          <button type="submit" class="btn-sm btn-danger">Finish</button>
        </form>
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
        @if($pesan->user_id == Auth::user()->id)
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
