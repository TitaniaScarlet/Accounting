<?php

namespace App\Http\Controllers\Admin;

use App\Ingredient;
use App\Unit;
use App\Category;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
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
      $menu = Menu::where('id', $request->menu_id)->first();
      Ingredient::create([
'category_id' => $request['category'],
'menu_id' => $request['menu_id'],
'quantity' => $request['quantity'],
'unit_id' => $request['unit']
      ]);
      return redirect()->route('admin.menu.show', $menu);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view ('admin.menus.ingredients.edit', [
          'ingredient' => $ingredient,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'delimiter' => '',
          'units' => Unit::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->category_id = $request['category'];
        $ingredient->quantity = $request['quantity'];
        $ingredient->unit_id = $request['unit'];
        $ingredient->save();
        $menu = Menu::where('id', $ingredient->menu_id)->first();
        return redirect()->route('admin.menu.show', $menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->back();
    }
}
