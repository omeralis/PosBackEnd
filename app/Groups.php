<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;
use App\Sales;

class Groups extends Model
{
    protected $fillable =[
        "nameGroup" 
    ];

    public function Items(){
        return $this->hasMany(Items::class);
    }
    public function GroupsSales(){
        return $this->belongsTo(Sales::class);
    }
}
