<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Unit;
use App\Category;
use App\Ingredient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.menus.index', [
      'menus' => Menu::with('children')->where('parent_id', 0)->paginate(5),
      'delimiter' => ''
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request)
  {


    return view('admin.menus.create', [
      'menu' => [],
      'menus' => Menu::with('children')->where('parent_id', 0)->get(),
      'delimiter' => '',
      'units' => Unit::get(),
      'categories' => Category::get(),

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
  $menu = Menu::create([
    'title' => $request['title'],
    'slug' => $request['slug'],
    'parent_id' => $request['parent_id'],
    'quantity' => $request['quantity'],
    'unit_id' => $request->input('unit'),
    'price' => $request['price'],
    'vat_rate' => $request['vat_rate'],
    'vat_sum' => $request['vat_sum']
  ]);
    return redirect()->route('admin.menu.index');
  }
  /**
  * Display the specified resource.
  *
  * @param  \App\Menu  $menu
  * @return \Illuminate\Http\Response
  */
  public function show(Menu $menu)
  {
    return view('admin.menus.show', [
      'menu' => $menu,
      'ingredients' => Ingredient::get(),
      'categories' => Category::with('children')->where('parent_id', 0)->get(),
      'delimiter' => '',
      'units' => Unit::get()
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Menu  $menu
  * @return \Illuminate\Http\Response
  */
  public function edit(Menu $menu)
  {
    return view('admin.menus.edit', [
      'menu' => $menu,
      'menus' => Menu::with('children')->where('parent_id', 0)->get(),
      'delimiter' => '',
      'units' => Unit::get(),
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Menu  $menu
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Menu $menu)
  {
    $menu->title = $request['title'];
    $menu->parent_id = $request['parent_id'];
    $menu->quantity = $request['quantity'];
    if ($request->unit != 0) {
      $menu->unit_id = $request->input('unit');
    }
    $menu->price = $request['price'];
    $menu->vat_rate = $request['vat_rate'];
    $menu->vat_sum = $request['vat_sum'];
    $menu->save();
    return redirect()->route('admin.menu.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Menu  $menu
  * @return \Illuminate\Http\Response
  */
  public function destroy(Menu $menu)
  {
    $menus_children = Menu::where('parent_id', $menu->id)->get();
    $menu->delete();
    foreach ($menus_children as $menu_children) {
    $menu_children->delete();
    }
    return redirect()->route('admin.menu.index');
  }
}
