<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orders;
class order_lines extends Model
{
    protected $guarded = [];
    
public function LinesOrder(){
    return $this->hasMany(Orders::class , 'id');
}
}
