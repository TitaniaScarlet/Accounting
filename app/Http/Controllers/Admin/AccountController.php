<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
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
          Account::create([
            'supplier_id' => $request['supplier'],
            'bank_account' => $request['bank_account'],
            'bank' => $request['bank'],
        ]);
        return redirect()->route('admin.supplier.show', $supplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
      $supplier = Supplier::where('id', $account->supplier_id)->first();

        return view ('admin.suppliers.accounts.edit', [
          'account' => $account,
          'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
      $supplier = Supplier::where('id', $account->supplier_id)->first();
            $account->bank_account = $request['bank_account'];
            $account->bank = $request['bank'];
            $account->save();
        return redirect()->route('admin.supplier.show', $supplier);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
      $account->delete();
      return redirect()->back();
    }
}
