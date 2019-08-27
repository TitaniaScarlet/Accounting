<?php

namespace App\Http\Controllers\Admin;

use App\Cost;
use App\Supplier;
use App\Item;
use App\Vat;
use App\Ttn;
use App\Distribution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.costs.index', [
          'costs' => Cost::latest('date')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.costs.create', [
          'cost' => [],
          'suppliers' => Supplier::get(),
          'items' => Item::with('children')->where('parent_id', 0)->get(),
          'delimiter' => '',
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
        $cost = Cost::create([
          'number' => $request['number'],
          'date' => $request['date'],
          'accounting_sum' => $request['accounting_sum'],
          'vat_rate' => $request['vat_rate'],
          'vat_sum' => $request['vat_sum'],
          'sum' => $request['sum'],
'description' => $request['description'],
'supplier_id' => $request->input('suppliers'),
'ttn_id' => $request->input('ttn')
        ]);
        if($request->input('items')) :
          $cost->items()->attach($request->input('items'));
        endif;
        Vat::create([
  'date' => $cost->date,
  'vat_rate' => $cost->vat_rate,
  'vat_input' => $cost->vat_sum,
  'vatable_id' => $cost->id,
  'vatable_type' => 'App\Cost'
        ]);

        return redirect()->route('admin.cost.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
      return view('admin.costs.show', [
        'cost' => $cost,
        'ttns' => Ttn::latest('date')->get(),
        'distributions' => Distribution::where('cost_id', $cost->id)->get(),
        'distribution_sum' => Distribution::where('cost_id', $cost->id)->sum('distribution_sum')
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $cost)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $cost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cost $cost)
    {
      $cost->delete();
        return redirect()->route('admin.cost.index');
    }
}
