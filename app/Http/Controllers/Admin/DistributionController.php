<?php

namespace App\Http\Controllers\Admin;

use App\Distribution;
use App\Ttnproduct;
use App\Cost;
use App\Ttn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ttnproducts = Ttnproduct::where('ttn_id', $request->ttn)->get();
        $cost = Cost::where('id', $request->cost_id)->first();
        $ttn = Ttn::where('id', $request->ttn)->first();
        $cost->ttn_id = $request->ttn;
        $cost->save();
        foreach ($ttnproducts as $ttnproduct) {
          Distribution::create([
            'ttnproduct_id' => $ttnproduct->id,
            'cost_id' => $cost->id,
            'distribution_sum' => ($ttnproduct->accounting_sum/$ttn->accounting_sum)*$cost->accounting_sum
          ]);
        }
        return redirect()->route('admin.cost.show', $cost);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        return view('admin.costs.distributions.edit', [
          'distribution' => $distribution
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
      $distribution->distribution_sum = $request['distribution_sum'];
      $distribution->save();
      $cost = Cost::where('id', $distribution->cost_id)->first();
      return redirect()->route('admin.cost.show', $cost);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
      $distribution->delete();
        return redirect()->back();

    }
}
