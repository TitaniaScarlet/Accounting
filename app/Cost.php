<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
  protected $guarded = [];

  public function vats()
  {
    return $this->morphMany('App\Vat', 'vatable');
  }
  public function supplier()
  {
    return $this->belongsTo('App\Supplier');
  }
  public function items()  {
    return $this->belongsToMany('App\Item');
  }
  public function ttn()  {
    return $this->belongsTo('App\Ttn');
  }
  public function distribution() {
    return $this->hasOne('App\Distribution');
  }
}
