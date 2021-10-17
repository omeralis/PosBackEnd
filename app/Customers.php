<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
use App\Orders;
class Customers extends Model
{
    protected $fillable =[
        "id" , "customerName" , "phone" , "other"
      ];
    public function Seles(){
        return $this->hasMany(Sales::class);
    }
    public function CustomerOrder()
    {
        return $this->hasMany(Orders::class);
    }

}
