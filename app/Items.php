<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Store;
use App\Groups;
use App\Sales;

class Items extends Model
{
    // protected $guarded = [];
    protected $fillable =[
        "itemName" , "groupNo" 
    ];
    public function Groups(){
        return $this->belongsTo(Groups::class , 'groupNo');
    }
    public function StoreItem(){
        return $this->belongsTo(Store::class);
    }
    public function SaleItem(){
        return $this->belongsTo(Sales::class);
    }
}
