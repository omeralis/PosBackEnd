<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order_lines;
use App\Orders;
class orderlineController extends Controller
{
    public function getOrderline(Request $request)
    {
        $order = order_lines::with('LinesOrder')->get();
        // $order = order_lines::all();
        return response()->json($order,200);
    }
    public function getOrder(Request $request)
    {
        $order = Orders::all()->last();
        return response()->json($order,200);
    }

    public function postOrderline(Request $request)
    {
        $data =  $request->all();
        // $data = Validator::make($request->all(), [
        //     'orderId'  => 'required|exists:orders,id'
        //    ]);
        //    if ($data->fails()) {
        //        return response()->json(['data'=>['Validator error'=>$data->errors()]],400);
        //        # code...
        //    }
        if ($data) {
            foreach($data as $order)
            {
                $order = order_lines::create($data);
            }
            return response()->json($order,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
