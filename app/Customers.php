<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
class Customers extends Model
{
    public function Seles(){
        return $this->hasMany(Sales::class);
    }
}
