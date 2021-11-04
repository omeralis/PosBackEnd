<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Store;
class Supplier extends Model
{
    protected $fillable =[
       "id" , "supplierName" , "phone" ,"other"
    ];
    public function SupplierPurchase(){
        return $this->hasMany(Purchase::class , 'supplier');
    }
}
