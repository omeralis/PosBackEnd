<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Store;
class Supplier extends Model
{
    protected $fillable =[
       "id" , "supplierName" , "phone" ,"other"
    ];
    public function Store(){
        return $this->hasMany(Store::class);
    }
}
