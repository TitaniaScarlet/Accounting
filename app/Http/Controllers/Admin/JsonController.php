<?php

namespace App\Http\Controllers\Admin;
use App\Ttn;
use App\Supplier;
// use App\Product;
// use App\Unit;
// use App\Subdivision;
// use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

class JsonController extends Controller
{
  public function json() {
    $ttns = Ttn::get();
    $suppliers = Supplier::get();
    // $products = Product::get();
    // $units = Unit::get();
    // $subdivisions = Subdivision::get();

    return [
      'ttns' => json_encode($ttns),
      'suppliers' => json_encode($suppliers),
      // 'products' => json_encode($products),
      // 'units' => json_encode($units),
      // 'subdivisions' => json_encode($subdivisions),
    ];
  }

  public function ttn(Request $request) {
    if($request->has('ttn')&&$request->has('date')) {
    $value = $request->session()->put('ttn', $request->input('ttn'));
    $value = $request->session()->put('date', $request->input('date'));
    }
  }
}
