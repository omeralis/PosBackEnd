<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
class OrdersController extends Controller
{
    public function getOrder(Request $request)
    {
        $order = 
        Orders::with('OrderCustomer')->
        with('OrderStore')->
        get();
        return response()->json($order,200);
    }
    public function postOrder(Request $request)
    {
        $data =  $request->all();
        if ($data) {
            $order = Orders::create($data);
            return response()->json($order,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
