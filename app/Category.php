<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

protected $fillable = ['title', 'slug', 'parent_id'];

public function setSlugAttribute($value) {
$this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
}

public function children() {
   return $this->hasMany(self::class, 'parent_id');
}

public function products() {
    return $this->belongsToMany('App\Product');
  }
  // public function menus() {
  //     return $this->belongsToMany('App\Menu');
  //   }
    public function ingredients()
   {
     return $this->hasMany('App\Ingredient');
   }
}
