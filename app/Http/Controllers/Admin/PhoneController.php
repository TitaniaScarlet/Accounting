<?php

namespace App\Http\Controllers\Admin;

use App\Phone;
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
      // $units = Unit::with('ingredients')->get();
      // $categories = Category::with('children')->where('parent_id', 0)->get();
      // $children = Category::with('children')->where('parent_id', '>',  0)->get();
      //       return [
      //     'units' => json_encode($units),
      //   'categories'=> json_encode($categories),
      //   'children' => json_encode($children),
      // ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->has('supplier') && $request->has('code') && $request->has('number') && $request->has('operator')) {
        // $menu = Menu::where('id', $request->menu)->first();
          Phone::create([
            'supplier_id' => $request->input('supplier'),
            'code' => $request->input('code'),
            'number' => $request->input('number'),
            'operator' => $request->input('operator'),

        ]);
              }
      // return redirect()->route('admin.menu.show', Menu::with('ingredients')->where('id', $request->menu)->first());
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
        //
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
        //
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
