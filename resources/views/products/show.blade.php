@extends('layouts.app')
@section('title') Detail Product @endsection
@section('content')
<div class="container justify mx-auto" style="padding: 0;;margin: 0">
       <div class="row">
            <div class="col-sm-6 justify mx-auto" style="margin: 5% 0;">
              @if($product->cover)
                <img src="{{asset('storage/' . $product->cover)}}"/>

              @endif
            </div>
            <div class="col-sm-6">
                <h1>{{$product->title}}</h1>
                <h2 style="padding-top: 0;">White</h2>
                <h1>Rp. {{$product->price}}</h1>
                <br>
                <br>
                <form action="{{route('products.coba', ['id' => $product->id ])}}" method="POST" enctype="multipart/form-data" class="">
                  @csrf
                  <input  type="hidden" id="price" value="{{$product->price}}" name="price">
                  <input  type="hidden" id="cover" value="{{$product->cover}}" name="cover">
                  <input  type="hidden" id="title" value="{{$product->title}}" name="title">
                  <input  type="hidden" id="convection" value="{{$product->convection}}" name="convection">
                  <input  type="hidden" id="product_id" value="{{$product->id}}" name="product_id">
                  <input  type="hidden" id="staff_id" value="{{$product->created_by}}" name="staff_id">
                  <button type="submit" class="btn">Orded Now</button>

                </form>
                <div class="row" id="asd">
                  @foreach($products as $product)
                  <div class="col-sm-3">
                  <a href="{{route('products.show', ['id' => $product->id])}}">
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
        </div>
    </div>
@endsection
