@extends("layouts.app")
@section("title") Products list @endsection
@section("content")
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
<div class="row">
  <div class="col-md-6">
    <form action="{{route('products.index')}}">
      <div class="input-group">
        <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
        <div class="input-group-append">
          <input type="submit" value="Filter" class="btn btn-primary">
        </div>
      </div>
</form>
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item" style="margin-left:5px">
        <a class="btn btn-primary" href="{{route('products.index')}}">All</a>
      </li>
      <li class="nav-item" style="margin-left:5px">
        <a class="btn btn-primary" href="{{route('products.index', ['status' =>'publish'])}}">Publish</a>
      </li>
      <li class="nav-item" style="margin-left:5px">
        <a class="btn btn-primary" href="{{route('products.index', ['status' =>'draft'])}}">Draft</a>
      </li>
      <li class="nav-item"  style="margin-left:5px">
        <a class="btn btn-primary" href="{{route('products.trash')}}">Trash</a>
      </li>
      <li class="nav-item text-right" style="margin-left:5px">
        <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
      </li>
    </ul>
  </div>
  <hr class="my-3">

</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th><b>Cover</b></th>
      <th><b>Title</b></th>
      <th><b>Convection</b></th>
      <th><b>Status</b></th>
      <!-- <th><b>Categories</b></th> -->
      <!-- <th><b>Stock</b></th> -->
      <th><b>Price</b></th>
      <th><b>Action</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    @if($product->created_by == Auth::user()->id )
    <tr>
      <td>
        @if($product->cover)
        <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
        @endif
      </td>
      <td>{{$product->title}}</td>
      <td>{{$product->convection}}</td>
      <td>
        @if($product->status == "DRAFT")
        <span class="badge bg-dark text-white">{{$product->status}}</span>
        @else
        <span class="badge badge-success">{{$product->status}}</span>
        @endif
      </td>
      <!-- <td>
        <ul class="pl-3">
          @foreach($product->categories as $category)
          <li>{{$category->name}}</li>
          @endforeach
        </ul>
            </td> -->
            <!-- <td>{{$product->stock}}</td> -->
            <td>{{$product->price}}</td>
            <td>
              <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-info btn-sm"> Edit </a>
              <form method="POST" class="d-inline" onsubmit="return confirm('Move product to trash?')" action="{{route('products.destroy', ['id' => $product->id ])}}">
                @csrf
                <input type="hidden" value="DELETE" name="_method">
                <input type="submit" value="Trash" class="btn btn-danger btn-sm">
              </form>
            </td>
          </tr>
          @endif
          @if(Auth::user()->roles== "[\"ADMIN\"]")
          <tr>
            <td>
              @if($product->cover)
              <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
              @endif
            </td>
            <td>{{$product->title}}</td>
            <td>{{$product->convection}}</td>
            <td>
              @if($product->status == "DRAFT")
              <span class="badge bg-dark text-white">{{$product->status}}</span>
              @else
              <span class="badge badge-success">{{$product->status}}</span>
              @endif
            </td>
            <!-- <td>
              <ul class="pl-3">
                @foreach($product->categories as $category)
                <li>{{$category->name}}</li>
                @endforeach
              </ul>
                  </td> -->
                  <!-- <td>{{$product->stock}}</td> -->
                  <td>{{$product->price}}</td>
                  <td>
                    <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-info btn-sm"> Edit </a>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Move product to trash?')" action="{{route('products.destroy', ['id' => $product->id ])}}">
                      @csrf
                      <input type="hidden" value="DELETE" name="_method">
                      <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                    </form>
                  </td>
                </tr>
                @endif
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
  </div>
@endsection
