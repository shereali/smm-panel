<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public $fillable = ['user_id','transaction_id','currency_code','payment_status'];
}
