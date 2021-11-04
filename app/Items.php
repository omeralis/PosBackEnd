<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Units;
use App\Store;
use App\Groups;
use App\order_lines;
class Items extends Model
{
    protected $guarded = [];
    // protected $fillable =[
    //   "id" , "itemName" , "groupNo" 
    // ];
    public function Groups(){
        return $this->belongsTo(Groups::class , 'groupNo');
    }
    public function UnitsItem(){
        return $this->belongsTo(Units::class , 'unitItem');
    }
    public function ItemPurchase(){
        return $this->hasMany(Purchase::class , 'item');
    }

    public function LinesOrderItem(){
        return $this->hasMany(order_lines::class , 'itemNo');
  }
}
