<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $guarded = [];

    public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-menu-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function children() {
       return $this->hasMany(self::class, 'parent_id');
    }
    public function categories() {
          return $this->belongsToMany('App\Category');
        }

        public function ingredients()
       {
         return $this->hasMany('App\Ingredient');
       }
       public function unit()  {
           return $this->belongsTo('App\Unit');
         }
}
