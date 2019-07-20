<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    protected $guarded = [];

    public function vatable()
{
  return $this->morphTo();
}
}
