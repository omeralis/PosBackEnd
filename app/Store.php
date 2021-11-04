<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Supplier;
use App\Orders;
use App\Purchase;
class Store extends Model
{
    protected $guarded = [];

    // protected $fillable =[
    //     "id" , "purchaseNo" , "purchaseDate" ,"itemNo"  ,"supplierNo" ,"quantity" ,"alarmQuantity" , "cost" , "priceItem" , "other"
    //  ];
    // public function ItemsStore(){
    //     return $this->belongsTo(Items::class , 'itemNo');
    // }
    // public function SupplierStore(){
    //     return $this->belongsTo(Supplier::class , 'supplierNo');
    // }
    public function StorePurchase()
    {
        return $this->hasMany(Purchase::class ,'store' );
    }
    public function StoreOrder()
    {
        return $this->hasMany(Orders::class );
    }

}
