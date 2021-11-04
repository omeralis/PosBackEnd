<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $guarded = [];
    public function ItemUnits(){
        return $this->hasMany(Items::class , 'unitItem');
    }
}
