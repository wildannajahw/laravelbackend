@extends('layouts.app')

@section('content')

<div class="container-fluid" id="anjing" style="margin-top:5%;">

        <p class="text1">
            Our Collection
        </p>
        <div class="col-md-6 d-flex justify-content-center" style="margin-bottom: 30px">
          <form action="{{route('collection')}}">
            <div class="input-group">
              <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
              <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
              </div>
            </div>
        </form>
        </div>
        <div class="row" id="asd">
          @foreach($products as $product)
          <div class="col-sm-3">
          <a href="#">
            @if($product->cover)
              <img src="{{asset('storage/' . $product->cover)}}" width="100%"/>
            @endif
            <p class="tb"><br>{{$product->title}}</p>
            <p>Rp. {{$product->price}}</p>
          </a>
          </div>
          @endforeach
        </div>
</div>
@endsection
