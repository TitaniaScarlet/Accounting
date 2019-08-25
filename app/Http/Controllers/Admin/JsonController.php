<?php

namespace App\Http\Controllers\Admin;
use App\Ttn;
use App\Supplier;
use App\Transference;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Repository;

class JsonController extends Controller
{
  public function json() {
    $ttns = Ttn::get();
    $suppliers = Supplier::get();
    return [
      'ttns' => json_encode($ttns),
      'suppliers' => json_encode($suppliers),
    ];
  }

  public function ttn(Request $request) {
    if($request->has('ttn')&&$request->has('date')) {
    $value = $request->session()->put('ttn', $request->input('ttn'));
    $value = $request->session()->put('date', $request->input('date'));
    }
  }

  public function distribution() {
    $ttns = Ttn::get();
    $transferences = Transference::get();
    $products = Product::get();
    // $costs = Cost::get();
    return [
      'ttns' => json_encode($ttns),
      'transferences' => json_encode($transferences),
      'products' => json_encode($products),

      // 'costs' => json_encode($costs)
    ];

  }
}
