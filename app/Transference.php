<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transference extends Model
{
  protected $fillable = ['date', 'ttnproduct_id', 'quantity', 'unit_id', 'accounting_sum', 'accounting_price'];

  // public function setSlugAttribute($value) {
  // $this->attributes['slug'] = Str::slug(mb_substr($this->ttn, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  // }

  // public function product()  {
  //   return $this->belongsTo('App\Product');
  // }
  public function unit()  {
    return $this->belongsTo('App\Unit');
  }

  public function subdivisions() {
    return $this->belongsToMany('App\Subdivision');
  }
  // public function vats()
  // {
  //   return $this->morphMany('App\Vat', 'vatable');
  // }
  // public function ttn()  {
  //   return $this->belongsTo('App\Ttn');
  // }
  public function distribution() {
    return $this->hasOne('App\Distribution');
  }
  public function ttnproduct()  {
    return $this->belongsTo('App\Ttnproduct');
  }
}
