<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_commodity_snop extends Model
{
    protected $table = 'order_commodity_snop';
    public $timestamps = false;

    public function extend(){
        return $this->hasOne(Order_extend::class,'snopid','snopid');
    }
}
