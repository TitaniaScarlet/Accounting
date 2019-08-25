<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ttnproduct extends Model
{
    protected $guarded = [];

    public function product()  {
      return $this->belongsTo('App\Product');
    }
    public function unit()  {
      return $this->belongsTo('App\Unit');
    }

    public function vats()
    {
      return $this->morphMany('App\Vat', 'vatable');
    }
    public function ttn()  {
      return $this->belongsTo('App\Ttn');
    }
    public function distribution() {
      return $this->hasOne('App\Distribution');
    }
    public function transferences()
   {
     return $this->hasMany('App\Transference');
   }
}
