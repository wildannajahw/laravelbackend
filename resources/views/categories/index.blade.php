@extends("layouts.app")
@section("title") Users list @endsection
@section("content")
<div class="row">
  <div class="col-md-6">
    <form action="{{route('categories.index')}}">
      <div class="input-group mb-3">
        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Filter berdasarkan email"/>
      <div class="input-group-append">
        <input type="submit" value="Filter" class="btn btn-primary">
      </div>
      </div>
    </form>
  </div>
</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><b>Name</b></th>
        <th><b>Slug</b></th>
        <th><b>Image</b></th>
        <th><b>Action</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td>
            No Image
          
        </td>
        <td>
          [TODO: action]
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
