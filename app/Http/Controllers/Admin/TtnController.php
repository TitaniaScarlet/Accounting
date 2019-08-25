<?php

namespace App\Http\Controllers\Admin;

use App\Ttn;
use App\Supplier;
use App\Transference;
use App\Vat;
use App\Ttnproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TtnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ttns.index', [
          'ttns' => Ttn::latest('date')->paginate(16)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ttns.create', [
          'ttn' => [],
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
        Ttn::create([
          'number' => $request['number'],
          'date' => $request['date'],
          'sum' => $request['sum'],
          'vat_sum' => $request['vat_sum'],
          'accounting_sum' => $request['accounting_sum'],
          'supplier_id' => $request->input('suppliers')
        ]);
        return redirect()->route('admin.ttn.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ttn  $ttn
     * @return \Illuminate\Http\Response
     */
    public function show(Ttn $ttn)
    {
      // $vat_sum = 0;
      // $ttnproduct = Transference::where('ttn_id', $ttn->id)->get();
      // foreach ($transferences as $transference) {
      //   $vat = Vat::where('vatable_type', 'App\Transference')->where('vatable_id', $transference->id)->first();
      //   $vat_sum += $vat->vat_input;
      // }
        return view('admin.ttns.show', [
          'ttn' => $ttn,
          'accounting_sum' => Ttnproduct::where('ttn_id', $ttn->id)->sum('accounting_sum'),
          'vat_sum' => Ttnproduct::where('ttn_id', $ttn->id)->sum('vat_sum'),
          'sum' => Ttnproduct::where('ttn_id', $ttn->id)->sum('sum'),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ttn  $ttn
     * @return \Illuminate\Http\Response
     */
    public function edit(Ttn $ttn)
    {
      return view('admin.ttns.edit', [
        'ttn' => $ttn,
        'suppliers' => Supplier::get()
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ttn  $ttn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ttn $ttn)
    {
        $ttn->number = $request['number'];
        $ttn->date = $request['date'];
        $ttn->sum = $request['sum'];
        $ttn->vat_sum = $request['vat_sum'];
        $ttn->accounting_sum = $request['accounting_sum'];
        $ttn->supplier_id = $request->input('suppliers');
        $ttn->save();
        $ttnproducts = Ttnproduct::with('ttn')->where('ttn_id', $ttn->id)->get();
        foreach ($ttnproducts as $ttnproduct) {
          $transference = Transference::with('ttnproduct')->where('ttnproduct_id', $ttnproduct->id)->first();
            $transference->date = $ttn->date;
            $transference->save();
              }
              foreach ($ttnproducts as $ttnproduct) {
                $vat = Vat::where('vatable_type', 'App\Ttnproduct')->where('vatable_id', $ttnproduct->id)->first();
                  $vat->date = $ttn->date;
                  $vat->save();
              }
        return redirect()->route('admin.ttn.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ttn  $ttn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ttn $ttn)
    {
      $ttn->delete();
      return redirect()->route('admin.ttn.index');

    }
}
