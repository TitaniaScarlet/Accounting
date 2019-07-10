<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  protected $guarded = [];

  public function supplier()
 {
   return $this->belongsTo('App\Supplier');
 }
}
