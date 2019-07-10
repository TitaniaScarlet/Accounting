<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use App\Phone;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  return redirect()->route('admin.phone.index');

     */
    public function index()
    {
      return view('admin.suppliers.index', [
        'suppliers' => Supplier::paginate(10),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create', [
          'supplier' => [],
          // 'phone' => []
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
        $supplier = Supplier::create([
          'title' => $request['title'],
          'unp' =>$request['unp'],
          'address' => $request['address'],
          'address_legal' => $request['address_legal'],
          'index' => $request['index'],
          'index_legal' => $request['index_legal'],
           'email' => $request['email']
        ]);
        if($request->code) {
          Phone::create([
            'supplier_id' => $supplier->id,
            'code' => $request['code'],
            'number' => $request['number'],
            'operator' => $request['operator'],
          ]);
        }
        if($request->bank_account) {
          Account::create([
            'supplier_id' => $supplier->id,
            'bank_account' => $request['bank_account'],
            'bank' => $request['bank'],
          ]);
        }
        if($request->contract_number) {
          Contract::create([
            'supplier_id' => $supplier->id,
            'date' => $request['date'],
            'number' => $request['contract_number'],
          ]);
        }

        return redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('admin.suppliers.show', [
          'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
      // $phones = Phone::with('supplier')->get();
      // $accounts = Account::with('supplier')->get();
        return view('admin.suppliers.edit', [
          'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
         $supplier->update($request->all());
         return redirect()->route('admin.supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
      $supplier->delete();
  return redirect()->route('admin.supplier.index');
    }
}
