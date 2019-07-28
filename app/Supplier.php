<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
      protected $fillable = ['title', 'unp', 'country', 'city', 'address', 'index', 'phone_number'];

        public function phones()
        {
         return $this->hasMany('App\Phone');
        }
        public function accounts()
        {
         return $this->hasMany('App\Account');
        }
        public function contracts()
        {
         return $this->hasMany('App\Contract');
        }
        public function ttns()
        {
         return $this->hasMany('App\Ttn');
        }
        }
