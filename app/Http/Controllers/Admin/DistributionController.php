<?php

namespace App\Http\Controllers\Admin;

use App\Distribution;
use App\Transference;
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
        $transferences = Transference::where('ttn_id', $request->ttn)->get();
        $cost = Cost::where('id', $request->cost_id)->first();
        $ttn = Ttn::where('id', $request->ttn)->first();
        foreach ($transferences as $transference) {
          Distribution::create([
            'transference_id' => $transference->id,
            'cost_id' => $cost->id,
            'distribution_sum' => ($ttn->accounting_sum/$transference->accounting_price)*$cost->accounting_price
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
        //
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
        //
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
