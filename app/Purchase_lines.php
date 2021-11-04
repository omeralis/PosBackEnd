<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Purchase;
class Purchase_lines extends Model
{
    protected $guarded = [];
  
  public function LinesPurchase(){
        return $this->belongsTo(Purchase::class , 'purchaseId');
  }
  public function PurchaseItem(){
    return $this->belongsTo(Items::class , 'item');
}
}
