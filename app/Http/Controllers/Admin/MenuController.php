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
    'price' => $request['price']
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
      'ingredients' => Ingredient::get()
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
    $category->update($request->except('slug'));
    return redirect()->route('admin.category.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Menu  $menu
  * @return \Illuminate\Http\Response
  */
  public function destroy(Menu $menu)
  {
    $menu->delete();
    return redirect()->route('admin.menu.index');
  }
}
