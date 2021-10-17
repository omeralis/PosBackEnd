<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customers;
use App\Store;
use App\order_lines;
class Orders extends Model
{
    protected $guarded = [];

    public function OrderCustomer()
    {
        return $this->belongsTo(Customers::class ,'customerNo');
    }
    public function OrderStore()
    {
        return $this->belongsTo(Store::class ,'storeNo');
    }
    public function orderLines(){
        return $this->belongsTo(order_lines::class , 'orderId');
    }
}
