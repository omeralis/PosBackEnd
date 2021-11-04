<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase_lines;
use App\Purchase;
use App\Items;
class PurchaselinesController extends Controller
{
    public function getPurchases(Request $request)
    {
        $purchase = Purchase::with('PurchaseStore')->with('PurchaseSupplier')->with('PurchaseLines')->with('PurchaseLines.PurchaseItem')->get();
        return response()->json($purchase,200);
    }
    public function postPurchases(Request $request)
    {
      
        try{   
            $data =  $request->all('store' , 'supplier' ,'purchaseStatus', 'purchaseDate');
            if ($data) {
                $purchases = Purchase::create($data);
            }
            if ($request->isMethod('post')) {
                $purchaseData = $request->all();
                foreach ($purchaseData['data'] as $key => $value) {
                    $purchase = new Purchase_lines;
                    $purchase->purchaseId = $value['purchaseId'] = $purchases->id;
                    $purchase->item= $value['item'];
                    $purchase->quantity= $value['quantity'];
                    $purchase->cost= $value['cost'];
                    $purchase->save();
                }
                // return response($purchases->id);
                return response()->json(['message'=>'Successfuly']);
            }
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function EditPurchases(){

    }
}