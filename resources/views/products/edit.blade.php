@extends('layouts.app')

@section('title') Edit product @endsection

@section('content')
  <div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" method="POST" action="{{route('products.update', ['id' => $product->id])}}" class="p-3 shadow-sm bg-white">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <label for="title">Title</label><br>
      <input type="text" class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" value="{{$product->title}}" name="title" placeholder="Product title"/><br>
      <div class="invalid-feedback">
        {{$errors->first('title')}}
      </div>
      <br>
      <label for="cover">Cover</label><br>
      <small class="text-muted">Current cover</small><br>
      @if($product->cover)
      <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
      @endif
      <br><br>
      <input type="file" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" name="cover">
      <div class="invalid-feedback">
        {{$errors->first('cover')}}
      </div>
      <br>
      <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
      <br><br>
      <label for="slug">Slug</label><br>
      <input type="text" class="form-control" value="{{$product->slug}}" name="slug" placeholder="enter-a-slug"/><br>
      </select>
      <br>
      <label for="price">Price</label><br>
      <input type="text" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" name="price" placeholder="Price" id="price" value="{{$product->price}}">
      <div class="invalid-feedback">
        {{$errors->first('price')}}
      </div>
      <br>
      <label for="">Status</label>
      <select name="status" id="status" class="form-control">
        <option {{$product->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
        <option {{$product->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT">DRAFT</option>
      </select><br>
      <button class="btn btn-primary" value="PUBLISH">Update</button>
    </form>
  </div>

@endsection
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>$('#categories').select2({ajax: {url: 'http://larashop.test/ajax/categories/search',processResults: function(data){
  return {
    results: data.map(function(item){
      return {id: item.id, text:item.name} })
    }
  }
}
});
var categories = {!! $product->categories !!} categories.forEach(function(category){
  var option = new Option(category.name, category.id, true, true);
  $('#categories').append(option).trigger('change');
});
</script>
@endsection
