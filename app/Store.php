<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Sales;
use App\Supplier;

class Store extends Model
{

    protected $fillable =[
        "id" , "purchaseNo" , "purchaseDate" ,"itemNo"  ,"supplierNo" ,"quantity" ,"alarmQuantity" , "cost" , "priceItem" , "other"
     ];
    public function ItemsStore(){
        return $this->belongsTo(Items::class , 'itemNo');
    }
    public function SupplierStore(){
        return $this->belongsTo(Supplier::class , 'supplierNo');
    }
    public function SalesStore(){
        return $this->belongsTo(Sales::class);
    }

}
