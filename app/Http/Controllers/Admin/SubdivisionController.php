<?php

namespace App\Http\Controllers\Admin;

use App\Subdivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubdivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subdivisions.index', [
          'subdivisions' => Subdivision::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subdivisions.create', [
          'subdivision' => []
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
      Subdivision::create($request->all());
     return redirect()->route('admin.subdivision.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subdivision  $subdivision
     * @return \Illuminate\Http\Response
     */
    public function show(Subdivision $subdivision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subdivision  $subdivision
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdivision $subdivision)
    {
        return view('admin.subdivisions.edit', [
          'subdivision' => $subdivision
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subdivision  $subdivision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdivision $subdivision)
    {
      $subdivision->update($request->except('slug'));
      return redirect()->route('admin.subdivision.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subdivision  $subdivision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdivision $subdivision)
    {
      $subdivision->delete();
        return redirect()->route('admin.subdivision.index');
    }
}
