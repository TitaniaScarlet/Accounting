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
        $units = Unit::with('ingredients')->get();
        $categories = Category::with('children')->where('parent_id',  0)->get();
         $children = Category::with('children')->where('parent_id', '>',  0)->get();
              return [
            'units' => json_encode($units),
          'categories'=> json_encode($categories),
           'children' => json_encode($children),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      if($request->has('menu') && $request->has('category') && $request->has('quantity') && $request->has('unit')) {
         // $menu = Menu::with('ingredients')->where('id', $request->menu)->first();
        $ingredient = Ingredient::create([
            'category_id' => $request->input('category'),
            'menu_id' => $request->input('menu'),
            'quantity' => $request->input('quantity'),
            'unit_id' => $request->input('unit')
        ]);
            }
             // $menu = Menu::where('id', $ingredient->menu_id)->first();
      return redirect()->route('admin.menu.show', $ingredient->menu);
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
        //
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
        //
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
