<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
class SalesController extends Controller
{
    public function getSales(){
        // $sale =  Sales::with('ItemsStore')->with('SupplierStore')->get();
        $sale =  Sales::all();
        return  response()->json($sale, 200);
    }
    public function postSales(Request $request){
        $data = $request->all();
        if ($data) {
            $sale = Sales::create($data);
            return response()->json($sale, 200);
        }
        return response()->json(['message'=> 'error'],404);
    }
}
