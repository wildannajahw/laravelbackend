<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = \App\Product::with('categories')->paginate(10);
      return view('products.index', ['products'=> $products]);
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
      $new_product = new \App\Product;
      $new_product->title = $request->get('title');
      $new_product->convection = $request->get('convection');
      $new_product->price = $request->get('price');
      $new_product->stock = $request->get('stock');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = \App\product::findOrFail($id);
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
      $book = \App\Book::findOrFail($id);
      $book->title = $request->get('title');
      $book->slug = $request->get('slug');
      $book->description = $request->get('description');
      $book->author = $request->get('author');
      $book->publisher = $request->get('publisher');
      $book->stock = $request->get('stock');
      $book->price = $request->get('price');
      $new_cover = $request->file('cover');
      if($new_cover){
        if($book->cover && file_exists(storage_path('app/public/' . $book->cover))){\Storage::delete('public/'. $book->cover);
        }
        $new_cover_path = $new_cover->store('book-covers', 'public');
        $book->cover = $new_cover_path;
      }
      $book->updated_by = \Auth::user()->id;
      $book->status = $request->get('status');
      $book->save();
      $book->categories()->sync($request->get('categories'));
      return redirect()->route('books.edit', ['id'=>$book->id])->with('status', 'Book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
