<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase_lines;
class Purchase extends Model
{
    protected $guarded = [];
    public function PurchaseLines(){
        return $this->hasMany(Purchase_lines::class , 'purchaseId');
    }
    public function PurchaseStore()
    {
        return $this->belongsTo(Store::class ,'store');
    }
    public function PurchaseSupplier(){
        return $this->belongsTo(Supplier::class , 'supplier');
    }
}
