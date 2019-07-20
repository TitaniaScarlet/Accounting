<?php

namespace App\Http\Controllers\Admin;

use App\Ttn;
use App\Supplier;
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
        //
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
