<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
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
         $supplier = Supplier::where('id', $request->supplier)->first();
          Contract::create([
            'supplier_id' => $request['supplier'],
            'date' => $request['date'],
            'number' => $request['number'],
        ]);
        return redirect()->route('admin.supplier.show', $supplier);

              }



    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
      $supplier = Supplier::where('id', $contract->supplier_id)->first();

        return view ('admin.suppliers.contracts.edit', [
          'contract' => $contract,
          'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
      $supplier = Supplier::where('id', $contract ->supplier_id)->first();
     $contract->date = $request['date'];
     $contract->number = $request['number'];
$contract->save();
     return redirect()->route('admin.supplier.show', $supplier);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
      $contract->delete();
      return redirect()->back();

    }
}
