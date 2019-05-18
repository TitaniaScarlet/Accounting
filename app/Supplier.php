<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
      protected $fillable = ['title', 'unp', 'country', 'city', 'address', 'index', 'phone_number'];
}
