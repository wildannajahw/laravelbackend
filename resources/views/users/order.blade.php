@extends("layouts.app")
@section("title") Products list @endsection
@section("content")
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th><b>Customer</b></th>
      <th><b>Cover</b></th>
      <th><b>item</b></th>
      <th><b>Price</b></th>
      <th><b>Status</b></th>
      <!-- <th><b>Categories</b></th> -->
      <!-- <th><b>Stock</b></th> -->
      <th><b>Action</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach($pesans as $pesan)
    @if($pesan->staff_id == Auth::user()->id )
    <tr>
      <td>
        @if($product->cover)
        <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
        @endif
      </td>
      <td>{{$pesan->title}}</td>
      <td>{{$pesan->convection}}</td>
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
