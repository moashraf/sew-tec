<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItems () {
        return $this->hasMany('App\orderItem', 'order_id');
    }
    
    public function orderStatus () {
        return $this->hasMany('App\orderStatus', 'order_id');
    }
}
