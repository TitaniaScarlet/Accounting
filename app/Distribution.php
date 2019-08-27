<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $guarded  = [];

    public function cost()
 {
   return $this->belongsTo('App\Cost');
 }
 public function ttnproduct()
  {
    return $this->belongsTo('App\Ttnproduct');
  }

}
