<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
class SuppliersController extends Controller
{
    public function getSupplier(){
        $supplier = Supplier::all('id','supplierName' , 'phone' , 'other');
        return response()->json($supplier,200);
    }
    public function postSupplier(Request $request){
        $data =  $request->all();
        $this->validate($request, [
            'supplierName'  => 'required',
            'phone'  => 'required',
        ]);
        if ($data) {
            $supplier = Supplier::create($data);
            return response()->json($supplier ,200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditSupplier(Request $request){
        $id = $request->id;  
        $supplier = Supplier::where('id', $id)->first();
        $data = $request->all();
        if (isset($supplier)) {
            $supplier->update($data);
            return response()->json($supplier,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
    }
}
