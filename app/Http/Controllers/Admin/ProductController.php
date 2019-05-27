<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Unit;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    return view('admin.products.index', [
      'products' => Product::paginate(10),
// 'units' => Unit::with('product')->get()
    ]);
  }

  /**
  * Show the form for creating a new resource.
  * Product::with('units')
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.products.create', [
      'product' => [],
      'units' => Unit::with('products')->get(),
      'categories' => Category::with('children')->where('parent_id', 0)->get(),
      'delimiter' => '',
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $product = Product::create([
      'product_name' => $request['product_name'],
      'slug' => $request['slug'],
      'quantity' => $request['quantity'],
      'unit_id' => $request->input('units'),
      'manufacturer' => $request['manufacturer'],
      'country' => $request['country'],
    ]);
    if($request->input('categories')) :
      $product->categories()->attach($request->input('categories'));
    endif;
    return redirect()->route('admin.product.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function show(Product $product)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function edit(Product $product)
  {
    return view('admin.products.edit', [
      'product' => $product,
      'units' => Unit::get(),
      'categories' => Category::with('children')->where('parent_id', 0)->get(),
      'delimiter' => '',
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Product $product)
  {
    $product->product_name = $request['product_name'];
    $product->quantity = $request['quantity'];
    $product->unit_id = $request->input('units');
    $product->manufacturer = $request['manufacturer'];
    $product->country = $request['country'];
    $product->save();
    if($request->input('categories')) :
      $product->categories()->detach();
      $product->categories()->attach($request->input('categories'));
    endif;
    return redirect()->route('admin.product.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('admin.product.index');
  }
}
