<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
class Customers extends Model
{
    protected $fillable =[
        "id" , "customerName" , "phone" , "other"
      ];
    public function Seles(){
        return $this->hasMany(Sales::class);
    }
}
