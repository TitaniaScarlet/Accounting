<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ttn extends Model
{
    protected $guarded = [];

    public function supplier()
   {
     return $this->belongsTo('App\Supplier');
   }
   // public function transferences()
   // {
   //  return $this->hasMany('App\Transference');
   // }
   public function costs()
  {
    return $this->hasMany('App\Cost');
  }
  public function ttnproducts()
  {
   return $this->hasMany('App\Ttnproduct');
  }
}
