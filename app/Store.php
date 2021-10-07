<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Sales;

class Store extends Model
{

    public function ItemsGroup(){
        return $this->hasMany(Items::class);
    }
    public function Sales(){
        return $this->belongsTo(Sales::class);
    }

}
