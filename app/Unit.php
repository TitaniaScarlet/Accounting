<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
  protected $fillable = ['type'];

  public function products()
 {
   return $this->hasMany('App\Product');
 }

 public function transferences()
{
  return $this->hasMany('App\Transference');
}
}
