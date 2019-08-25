<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    protected $guarded = [];

    public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function costs()
   {
     return $this->belongsToMany('App\Cost');
   }
   public function children() {
      return $this->hasMany(self::class, 'parent_id');
   }

}
