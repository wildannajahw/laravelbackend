<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('welcome', compact('products'));
    }
    public function collection(Request $request)
    {
      $status = $request->get('status');
      $keyword = $request->get('keyword') ? $request->get('keyword') : '';
      if($status){

        $products = \App\Product::all()->where('title', "LIKE","%$keyword%");
      }
      else{
        $products = \App\Product::with('categories')->where("title", "LIKE","%$keyword%")->paginate(10);
      }
      return view('collection', compact('products'));
      // $status = $request->get('status');
      // $keyword = $request->get('keyword') ? $request->get('keyword') : '';
      // if($status){
      //   $products = \App\Product::all()->where('title', "LIKE","%$keyword%")->where('status', strtoupper($status));
      // }
      // else {
      //   $products = \App\Product::all()->where("title", "LIKE","%$keyword%");
      // }
      // return view('collection', ['products' => $products]);
      // if($status){
      //   $products = \App\Product::all()->where('status',strtoupper($status));
      // }
      // else {
      //   $products = \App\Product::all();
      //   return view('collection',  compact('products'));
      // }
    }


}
