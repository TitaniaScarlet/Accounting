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
   public function transferences()
   {
    return $this->hasMany('App\Transference');
   }
}
