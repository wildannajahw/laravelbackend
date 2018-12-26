@extends('layouts.app')

@section('title') Create product @endsection

@section('content')

@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
<div class="row">
  <div class="col-md-8">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
      @csrf
      <input type="text" class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" name="title" placeholder="Product name"><br>
      <div class="invalid-feedback">
        {{$errors->first('title')}}
      </div>
      <br>
      <input type="file" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" name="cover"><br>
      <div class="invalid-feedback">
        {{$errors->first('cover')}}
      </div>
      <br>
      <!-- <input type="number" class="form-control" id="stock" name="stock" min=0 value=0><br> -->
      <!-- <input type="text" class="form-control" name="convection" id="convection" placeholder="Convection"><br> -->

      <input type="number" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}"  name="price" id="price" placeholder="Product price"><br>
      <div class="invalid-feedback">
        {{$errors->first('price')}}
      </div>
      <br>
      <!-- <label for="categories">Categories</label><br>
      <selectname="categories[]" multiple id="categories" class="form-control">
      </select>
      <br><br> -->
      <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
      <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>

    </form>
  </div>
</div>
@endsection
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$('#categories').select2({
ajax: {
  url: 'http://larashop.test/ajax/categories/search',
  processResults: function(data){
  return {
    results: data.map(function(item){return {id: item.id, text:item.name} })
  }
  }
}
});
</script>
@endsection
