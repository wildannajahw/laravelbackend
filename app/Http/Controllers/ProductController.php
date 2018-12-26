<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct(){
      $this->middleware(function($request, $next){
        if(Gate::allows('manage-products')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses');
      });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $status = $request->get('status');
      $keyword = $request->get('keyword') ? $request->get('keyword') : '';
      if($status){
        $products = \App\Product::with('categories')->where('title', "LIKE","%$keyword%")->where('status', strtoupper($status))->paginate(10);
      }
      else {
        $products = \App\Product::with('categories')->where("title", "LIKE","%$keyword%")->paginate(10);
      }
      return view('products.index', ['products' => $products]);
      if($status){
        $products = \App\Product::with('categories')->where('status',strtoupper($status))->paginate(10);
      }
      else {
        $products = \App\Product::with('categories')->paginate(10);
        return view('products.index', ['products'=> $products]);
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      \Validator::make($request->all(), [
        "title" => "required|min:5|max:200",
        "price" => "required|digits_between:0,10",
        "cover" => "required"
        ])->validate();

      $new_product = new \App\Product;
      $new_product->title = $request->get('title');
      $new_product->convection = \Auth::user()->name;
      $new_product->price = $request->get('price');
      $new_product->stock = "10";
      $new_product->status = $request->get('save_action');
      $cover = $request->file('cover');
      if($cover){
        $cover_path = $cover->store('product-covers', 'public');
        $new_product->cover = $cover_path;
      }
      $new_product->categories()->attach($request->get('categories'));
      $new_product->slug = str_slug($request->get('title'));
      $new_product->created_by = \Auth::user()->id;
      $new_product->save();

      if($request->get('save_action') == 'PUBLISH'){
        return redirect()
          ->route('products.create')
          ->with('status', 'Product successfully saved and published');
      } else {
      return redirect()
        ->route('products.create')
        ->with('status', 'Product saved as draft');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $products = \App\Product::with('categories')->paginate(3);
      $product = \App\Product::findOrFail($id);
      return view('products.show', ['product' => $product], ['products'=> $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = \App\Product::findOrFail($id);
      return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


      $product = \App\Product::findOrFail($id);
      $product->title = $request->get('title');
      $product->slug = $request->get('slug');
      $product->convection = \Auth::user()->name;
      $product->price = $request->get('price');
      $new_cover = $request->file('cover');
      if($new_cover){
        if($product->cover && file_exists(storage_path('app/public/' . $product->cover))){\Storage::delete('public/'. $product->cover);
        }
        $new_cover_path = $new_cover->store('product-covers', 'public');
        $product->cover = $new_cover_path;
      }
      $product->updated_by = \Auth::user()->id;
      $product->status = $request->get('status');
      $product->save();
      $product->categories()->sync($request->get('categories'));
      return redirect()->route('products.edit', ['id'=>$product->id])->with('status', 'Product successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = \App\Product::findOrFail($id);
      $product->delete();
      return redirect()->route('products.index')->with('status', 'Product moved to trash');
    }

    public function trash(Request $request){
      $products = \App\Product::onlyTrashed()->paginate(10);

      return view('products.trash', ['products' => $products]);

    }

    public function restore($id){
      $product = \App\Product::withTrashed()->findOrFail($id);
      if($product->trashed()){
        $product->restore();
        return redirect()->route('products.trash')->with('status', 'Product successfully restored');
      }
      else {
        return redirect()->route('products.trash')->with('status', 'Product is not in trash');
      }
    }

    public function deletePermanent($id){
      $product = \App\Product::withTrashed()->findOrFail($id);
      if(!$product->trashed()){
        return redirect()->route('products.trash')->with('status', 'Product is not in trash!')->with('status_type', 'alert');
      }
      else {
        $product->categories()->detach();
        $product->forceDelete();
        return redirect()->route('products.trash')->with('status', 'Product permanently deleted!'
      );
    }
  }
  public function coba(Request $request, $id)
  {


    $new_pesan = new \App\Pesan;
    $product = \App\Product::findOrFail($id);
    $new_pesan->user_id = \Auth::user()->id;
    $new_pesan->product_id = $request->get('product_id');
    $new_pesan->staff_id =  $request->get('staff_id');
    $new_pesan->price = $request->get('price');
    $new_pesan->convection = $request->get('convection');
    $new_pesan->cover = $request->get('cover');
    $new_pesan->title = $request->get('title');
    $new_pesan->status = 'SUBMIT';
    $new_pesan->save();
    return view('products.create');

  }

}
