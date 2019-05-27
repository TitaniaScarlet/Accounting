<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
  protected $fillable = ['product_name', 'slug', 'quantity', 'manufacturer', 'unit_id', 'country'];

  public function setSlugAttribute($value) {
  $this->attributes['slug'] = Str::slug(mb_substr($this->product_name, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }

  public function unit()  {
      return $this->belongsTo('App\Unit');
    }

    public function categories() {
          return $this->belongsToMany('App\Category');
        }
}
