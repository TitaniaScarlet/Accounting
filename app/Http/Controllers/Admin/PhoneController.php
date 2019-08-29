<?php

namespace App\Http\Controllers\Admin;

use App\Phone;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $supplier = Supplier::where('id', $request->supplier)->first();
          Phone::create([
            'supplier_id' => $request['supplier'],
            'code' => $request['code'],
            'number' => $request['number'],
            'operator' => $request['operator'],
        ]);
        return redirect()->route('admin.supplier.show', $supplier);
              }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
      $supplier = Supplier::where('id', $phone->supplier_id)->first();

      return view ('admin.suppliers.phones.edit', [
        'phone' => $phone,
        'supplier' => $supplier
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
      $supplier = Supplier::where('id', $phone->supplier_id)->first();
        $phone->code = $request['code'];
            $phone->number = $request['number'];
            $phone->operator = $request['operator'];
      $phone->save();
        return redirect()->route('admin.supplier.show', $supplier);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
      $phone->delete();
      return redirect()->back();
    }
}
