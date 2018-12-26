@extends('layouts.app')
@section('title') Trashed Products @endsection
@section('content')
<div class="row">
    <div class="col-md-6">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item" style="margin-left:5px">
          <a class="btn btn-primary {{Request::get('status') == NULL && Request::path() == 'products' ? 'active' : ''}}" href="{{route('products.index')}}">All</a>
        </li>
        <li class="nav-item" style="margin-left:5px">
          <a class="btn btn-primary{{Request::get('status') == 'publish' ? 'active' : '' }}" href="{{route('products.index', ['status' => 'publish'])}}">Publish</a>
        </li>
        <li class="nav-item" style="margin-left:5px">
          <a class="btn btn-primary {{Request::get('status') == 'draft' ? 'active' : '' }}" href="{{route('products.index', ['status' => 'draft'])}}">Draft</a>
        </li>
        <li class="nav-item" style="margin-left:5px">
          <a class="btn btn-primary {{Request::path() == 'products/trash' ? 'active' : ''}}" href="{{route('products.trash')}}">Trash</a>
        </li>
      </ul>
    </div>
</div>
<div class="col-md-12">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <table class="table table-bordered table-stripped">
    <thead>
      <tr>
        <th><b>Cover</b></th>
        <th><b>Title</b></th>
        <th><b>Convection</b></th>
        <th><b>Categories</b></th>
        <th><b>Stock</b></th>
        <th><b>Price</b></th>
        <th><b>Action</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>
          @if($product->cover)
          <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
          @endif
        </td>
        <td>{{$product->title}}</td>
        <td>{{$product->convection}}</td>
        <td>
          <ul class="pl-3">
            @foreach($product->categories as $category)
            <li>{{$category->name}}</li>
            @endforeach
          </ul>
        </td>
        <td>{{$product->stock}}</td>
        <td>{{$product->price}}</td>
        <td>
          <form method="POST" action="{{route('products.restore', ['id' => $product->id])}}" class="d-inline">
            @csrf
            <input type="submit" value="Restore" class="btn btn-success btn-sm"/>
          </form>
          <form method="POST" action="{{route('products.delete-permanent', ['id' => $product->id])}}" class="d-inline" onsubmit="return confirm('Delete this product permanently?')">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="10">
          {{$products->appends(Request::all())->links()}}
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
