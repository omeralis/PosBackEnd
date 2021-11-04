<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Items;

class Groups extends Model
{
    protected $fillable =[
        "nameGroup" 
    ];

    public function Items(){
        return $this->hasMany(Items::class , 'groupNo');
    }
}
