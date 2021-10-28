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
      "id" , "itemName" , "groupNo" 
    ];
    public function Groups(){
        return $this->belongsTo(Groups::class , 'groupNo');
    }
    public function StoreItem(){
        return $this->hasMany(Store::class , 'itemNo');
    }
    public function SaleItem(){
        return $this->belongsTo(Sales::class);
    }
}
