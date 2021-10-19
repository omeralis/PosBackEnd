<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order_lines;
use App\Orders;
use DB;
class orderlineController extends Controller
{
    public function getOrderline(Request $request)
    {
        $order = order_lines::with('LinesOrder')->get();
        return response()->json($order,200);
    }
    public function getOrder(Request $request)
    {
        $order = Orders::all()->last();
        return response()->json($order,200);
    }

    public function postOrderline(Request $request)
    {
        try {
        if ($request->isMethod('post')) {
           $OrderData = $request->all();
           foreach ($OrderData['data'] as $key => $value) {
              $order = new order_lines;
              $order->orderId = $value['orderId'];
              $order->itemNo= $value['itemNo'];
              $order->quantity= $value['quantity'];
              $order->unitPrice= $value['unitPrice'];
              $order->subTotal= $value['subTotal'];
              $order->save();
           }
           return response()->json(['message'=>'Successfuly']);
        }
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }
}


