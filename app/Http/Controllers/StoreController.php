<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
class StoreController extends Controller
{
    public function getStore(){
        $store =  Store::with('ItemsStore')->with('SupplierStore')->get();
        // $store =  Store::all();
        return  response()->json($store, 200);
    }
    public function postStore(Request $request){
        $data = $request->all();
        if ($data) {
            $store = Store::create($data);
            return response()->json($store, 200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditStore(Request $request){
        $id = $request->id;  
        $store = Store::where('id', $id)->first();
        $data = $request->all();
        if (isset($store)) {
            $store->update($data);
            return response()->json($store,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
}
