<?php

namespace App\Http\Controllers\Admin;

use App\Transference;
use App\Product;
use App\Unit;
use App\Subdivision;
use App\Supplier;
use App\Vat;
use App\Ttn;
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
      'transferences' => Transference::latest('date')->paginate(10),
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
      'ttns' => Ttn::get()
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
if ($request->session()->has('ttn')) {
    $transference = Transference::create([
      'product_id' => $request->input('product_id'),
      'quantity' => $request['quantity'],
      'unit_id' => $request->input('unit_id'),
      'price' => $request['price'],
      'accounting_price' => $request['accounting_price'],
      'ttn_id' => $request->session()->pull('ttn'),
       'date' => $request->session()->pull('date')
    ]);
    }
    if($request->vat_rate && $request->vat_input) {
      Vat::create([
'date' => $transference->date,
'vat_rate' => $request['vat_rate'],
'vat_input' => $request['vat_input'],
'vatable_id' => $transference->id,
'vatable_type' => 'App\Transference'
      ]);
    }
    if($request->input('subdivisions')) :
      $transference->subdivisions()->attach($request->input('subdivisions'));
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
    return view('admin.transferences.show', [
      'transference' => $transference
    ]);
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
        'ttn_id' => $transference->ttn_id,
        'date' => $request['date'],
        'product_id' => $transference->product_id,
        'quantity' => $request['quantity'],
        'unit_id' => $transference->unit_id,
        'accounting_price' => $transference->accounting_price,
        'price' => $transference->price,
      ]);
      $transference_new->subdivisions()->attach($request->input('subdivisions'));
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
