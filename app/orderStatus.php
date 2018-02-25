<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderStatus extends Model
{
    public $table = 'orders_status_dates';
    
    public function status_data () {
        return $this->belongsTo('App\Status', 'order_status_id');
    }
}
