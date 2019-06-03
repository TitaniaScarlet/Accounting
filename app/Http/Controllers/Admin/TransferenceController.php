<?php

namespace App\Http\Controllers\Admin;

use App\Transference;
use App\Product;
use App\Unit;
use App\Subdivision;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransferenceController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.transferences.index', [
      'transferences' => Transference::orderBy('date')->paginate(10),
      'products' => Product::get()
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.transferences.create', [
      'transference' => [],
      'products' => Product::with('transferences')->get(),
      'units' => Unit::with('transferences')->get(),
      'subdivisions' => Subdivision::get(),
      'suppliers' => Supplier::get()
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
    $transference = Transference::create([
      'ttn' => $request['ttn'],
      'date' => $request['date'],
      'product_id' => $request->input('product_id'),
      'quantity' => $request['quantity'],
      'unit_id' => $request->input('unit_id'),
      'price' => $request['price'],
      'slug' => $request['slug']
    ]);
    if($request->input('subdivisions')) :
      $transference->subdivisions()->attach($request->input('subdivisions'));
    endif;
    if($request->input('suppliers')) :
      $transference->suppliers()->attach($request->input('suppliers'));
    endif;
    return redirect()->route('admin.transference.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function show(Transference $transference)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function edit(Transference $transference)
  {
    return view('admin.transferences.edit', [
      'transference' => $transference,
      'subdivisions' => Subdivision::get(),
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Transference $transference)
  {
    if($request->quantity == $transference->quantity) {
      $transference->date = $request['date'];
      $transference->quantity = $request['quantity'];
      $transference->save();
      if($request->input('subdivisions')) :
        $transference->subdivisions()->detach();
        $transference->subdivisions()->attach($request->input('subdivisions'));
      endif;
    }
    elseif ($request->quantity < $transference->quantity) {
      $transference_new = Transference::create([
        'ttn' => $transference->ttn,
        'date' => $request['date'],
        'product_id' => $transference->product_id,
        'quantity' => $request['quantity'],
        'unit_id' => $transference->unit_id,
        'price' => $transference->price,
        'slug' => $request['slug']
      ]);
      $transference_new->subdivisions()->attach($request->input('subdivisions'));
      foreach ($transference->suppliers as $supplier) {
        $transference_new->suppliers()->attach($supplier->id);
      }
      $new_quantity = $transference->quantity - $request->quantity;
      $transference->quantity = $new_quantity;
      $transference->save();
    }
    return redirect()->route('admin.transference.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function destroy(Transference $transference)
  {
    $transference->delete();
    return redirect()->route('admin.transference.index');
  }
}
