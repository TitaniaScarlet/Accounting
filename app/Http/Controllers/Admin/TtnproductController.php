<?php

namespace App\Http\Controllers\Admin;

use App\Ttnproduct;
use App\Product;
use App\Unit;
use App\Ttn;
use App\Transference;
use App\Vat;
use App\Subdivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TtnproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Product::get();
      $units = Unit::get();
      $subdivisions = Subdivision::get();
      return [
        'products' => json_encode($products),
        'units' => json_encode($units),
        'subdivisions' => json_encode($subdivisions)
      ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if($request->has('ttn') && $request->has('product') && $request->has('quantity') && $request->has('unit')&&
       $request->has('price') && $request->has('accountingsum') && $request->has('vatrate') && $request->has('vatsum') &&
       $request->has('sum')) {
             $ttnproduct = Ttnproduct::create([
            'ttn_id' => $request->input('ttn'),
            'product_id' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'unit_id' => $request->input('unit'),
            'accounting_price' => $request->input('price'),
            'accounting_sum' => $request->input('accountingsum'),
            'vat_rate' => $request->input('vatrate'),
            'vat_sum' => $request->input('vatsum'),
            'sum' =>$request->input('sum')
        ]);
        $ttn = Ttn::with('ttnproducts')->where('id', $ttnproduct->ttn_id)->first();
        $transference = Transference::create([
          'ttnproduct_id' => $ttnproduct->id,
          'date' => $ttn->date,
          'quantity' => $ttnproduct->quantity,
          'unit_id' => $ttnproduct->unit_id,
          'accounting_price' => $ttnproduct->accounting_price,
          'accounting_sum' => $ttnproduct->accounting_sum,
          ]);
          if($request->has('subdivision')) :
            $transference->subdivisions()->attach($request->input('subdivision'));
          endif;
          Vat::create([
    'date' =>  $ttn->date,
    'vat_rate' => $ttnproduct->vat_rate,
    'vat_input' => $ttnproduct->vat_sum,
    'vatable_id' => $ttnproduct->id,
    'vatable_type' => 'App\Ttnproduct'
          ]);
          return redirect()->route('admin.ttn.show', $ttn);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ttnproduct  $ttnproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Ttnproduct $ttnproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ttnproduct  $ttnproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Ttnproduct $ttnproduct)
    {
      $products = Product::get();
      $units = Unit::get();
      $subdivisions = Subdivision::get();
      $ttns = Ttn::get();
        return view('admin.ttnproducts.edit', [
          'ttnproduct' => $ttnproduct,
          'products' => $products,
          'units' => $units,
          'subdivisions' => $subdivisions,
          'ttns' => $ttns
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ttnproduct  $ttnproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ttnproduct $ttnproduct)
    {
      $ttnproduct->ttn_id = $request->input('ttn_id');
      $ttnproduct->product_id = $request->input('product_id');
      $ttnproduct->accounting_price = $request['accounting_price'];
      $ttnproduct->quantity = $request['quantity'];
      $ttnproduct->unit_id = $request->input('unit_id');
      $ttnproduct->accounting_sum = $request['accounting_sum'];
      $ttnproduct->vat_rate = $request['vat_rate'];
      $ttnproduct->vat_sum = $request['vat_sum'];
      $ttnproduct->sum = $request['sum'];
      $ttnproduct->save();
      if($request->input('subdivisions')) :
        $product->subdivisions()->detach();
        $ttnproduct->subdivisions()->attach($request->input('subdivisions'));
      endif;

      $ttn = Ttn::with('ttnproducts')->where('id', $ttnproduct->ttn_id)->first();
      $transference = Transference::with('ttnproduct')->where('ttnproduct_id', $ttnproduct->id)->first();
      $transference->quantity = $ttnproduct->quantity;
      $transference->date = $ttn->date;
      $transference->unit_id = $ttnproduct->unit_id;
      $transference->accounting_price = $ttnproduct->accounting_price;
      $transference->accounting_sum = $ttnproduct->accounting_sum;

      $vat = Vat::where('vatable_type', 'App\Ttnproduct')->where('vatable_id', $ttnproduct->id)->first();
      $vat->date = $ttn->date;
      $vat->vat_rate = $ttnproduct->vat_rate;
      $vat->vat_input = $ttnproduct->vat_sum;

      return redirect()->route('admin.ttn.show', $ttn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ttnproduct  $ttnproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ttnproduct $ttnproduct)
    {
      $ttnproduct->delete();
      $vat = Vat::where('vatable_type', 'App\Ttnproduct')->where('vatable_id', $ttnproduct->id)->first();
$vat->delete();
      return redirect()->back();

    }
}
