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
}
