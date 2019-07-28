<?php

namespace App\Http\Controllers\Admin;

use App\Vat;
use App\Transference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vats.index', [
        'vats' => Vat::latest('date')->paginate(10),
        'transferences' => Transference::get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Vat $vat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Vat $vat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vat $vat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        //
    }
}
