<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];

    // public function setSlugAttribute($value) {
    // $this->attributes['slug'] = Str::slug(mb_substr($this->code, 0, 40) . "-" . mb_substr($this->phone, 0, 40). '-' . mb_substr($this->operator, 0, 40));
    // }

    public function supplier()
   {
     return $this->belongsTo('App\Supplier');
   }

}
