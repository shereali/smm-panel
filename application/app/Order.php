<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function user() {
       $this->hasMany(User::class, 'user_id');
   }
}
