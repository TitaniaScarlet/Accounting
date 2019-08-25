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
    ]);
  }


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    // return view('admin.transferences.create', [
    //   'transference' => [],
    //   'products' => Product::with('transferences')->get(),
    //   'units' => Unit::with('transferences')->get(),
    //   'subdivisions' => Subdivision::get(),
    //   'ttns' => Ttn::get()
    // ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
// if ($request->session()->has('ttn')) {
//     $transference = Transference::create([
//       'product_id' => $request->input('product_id'),
//       'quantity' => $request['quantity'],
//       'unit_id' => $request->input('unit_id'),
//       'sum' => $request['sum'],
//       'accounting_price' => $request['accounting_price'],
//       'accounting_sum' => $request['accounting_sum'],
//       'ttn_id' => $request->session()->pull('ttn'),
//        'date' => $request->session()->pull('date')
//     ]);
//     }
//     if($request->vat_rate && $request->vat_input) {
//       Vat::create([
// 'date' => $transference->date,
// 'vat_rate' => $request['vat_rate'],
// 'vat_input' => $request['vat_input'],
// 'vatable_id' => $transference->id,
// 'vatable_type' => 'App\Transference'
//       ]);
//     }
//     if($request->input('subdivisions')) :
//       $transference->subdivisions()->attach($request->input('subdivisions'));
//     endif;
//     return redirect()->route('admin.transference.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function show(Transference $transference)
  {
    // return view('admin.transferences.show', [
    //   'transference' => $transference,
    //   'vat' => Vat::where('vatable_type', 'App\Transference')->where('vatable_id', $transference->id)->first()
    // ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Transference  $transference
  * @return \Illuminate\Http\Response
  */
  public function edit(Transference $transference)
  {
    // return view('admin.transferences.edit', [
    //   'transference' => $transference,
    //   'products' => Product::with('transferences')->get(),
    //   'units' => Unit::with('transferences')->get(),
    //   'subdivisions' => Subdivision::get(),
    //   'ttns' => Ttn::get(),
    //   'vat' => Vat::where('vatable_type', 'App\Transference')->where('vatable_id', $transference->id)->first()
    // ]);
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
 // $transference->product_id = $request['product_id'];
 // $transference->quantity = $request['quantity'];
 // $transference->unit_id = $request['unit_id'];
 // $transference->sum = $request['sum'];
 // $transference->accounting_sum = $request['accounting_sum'];
 // $transference->accounting_price = $request['accounting_price'];
 // $transference->save();
 // if($request->input('subdivisions')) :
 //   $transference->subdivisions()->detach();
 //   $transference->subdivisions()->attach($request->input('subdivisions'));
 // endif;
 // $vat = Vat::where('vatable_type', 'App\Transference')->where('vatable_id', $transference->id)->first();
 // $vat->vat_rate = $request['vat_rate'];
 // $vat->vat_input = $request['vat_input'];
 // $vat->save();
 //    return redirect()->route('admin.transference.index');
  }

  public function transfer(Transference $transference) {
    return view('admin.transferences.transfer', [
      'transference' => $transference,
      'subdivisions' => Subdivision::get(),
    ]);

  }


public function change(Request $request, Transference $transference) {
  if($request->quantity == $transference->quantity) {
    $transference->date = $request['date'];
    $transference->quantity = $request['quantity'];
    $transference->accounting_sum = $request['accounting_sum'];
    $transference->save();
    if($request->input('subdivisions')) :
      $transference->subdivisions()->detach();
      $transference->subdivisions()->attach($request->input('subdivisions'));
    endif;
  }
  elseif ($request->quantity < $transference->quantity) {
    $transference_new = Transference::create([
      'ttnproduct_id' => $transference->ttnproduct_id,
      'date' => $request['date'],
      'quantity' => $request['quantity'],
      'unit_id' => $transference->unit_id,
      'accounting_price' => $transference->accounting_price,
      'accounting_sum' => $request['accounting_sum'],
    ]);
    $transference_new->subdivisions()->attach($request->input('subdivisions'));
    $new_quantity = $transference->quantity - $request->quantity;
    $new_accounting_sum = $transference->accounting_sum - $request->accounting_sum;
    $transference->quantity = $new_quantity;
    $transference->accounting_sum = $new_accounting_sum;
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
