<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $guarded = [];

  public function supplier()
 {
   return $this->belongsTo('App\Supplier');
 }
}
