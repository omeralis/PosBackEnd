<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Store;
use App\Customers;

class Sales extends Model
{
    public function Items(){
        return $this->hasMany(Items::class);
    }
    public function Groups(){
        return $this->hasMany(Groups::class);
    }
    public function StoreSeles(){
        return $this->hasMany(Store::class);
    }
    public function CustomersSales(){
        return $this->belongsTo(Customers::class);
    }
}
