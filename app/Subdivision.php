<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subdivision extends Model
{
    protected $fillable = ['name', 'slug', 'address', 'type'];

    public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug(mb_substr($this->name, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }
}
