<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    
    protected $fillable = ['product_id'];
    
    public $timestamps = false;
    public $table = 'orders_items';
}
