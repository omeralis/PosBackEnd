<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orders;
use App\Items;
class order_lines extends Model
{
    // protected $guarded = [];
    protected $fillable =['orderId' , 'itemNo' , 'quantity' , 'unitPrice' ,'subTotal'];
    
        public function LinesOrder(){
              return $this->belongsTo(Orders::class , 'orderId');
        }
        public function ItemLinesOrder(){
            return $this->belongsTo(Items::class , 'itemNo' );
      }
}
