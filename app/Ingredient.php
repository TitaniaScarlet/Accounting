<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    public function category()
   {
     return $this->belongsTo('App\Category');
   }

   public function menu()
  {
    return $this->belongsTo('App\Menu');
  }

  public function unit()
 {
   return $this->belongsTo('App\Unit');
 }
}
