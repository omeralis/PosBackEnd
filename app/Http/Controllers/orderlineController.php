<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order_lines;
use App\Orders;
use App\Items;
use DB;
use DateTime;
use Validator;
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
           foreach ($OrderData['data '] as $key => $value) {
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

    public function InvoicSalesOrder(Request $request){
        // $order = Orders::where('id', $orderId)->get();
        // return response()->json($order,200);
        $orderId = $request->orderId;  
        $orderlines = order_lines::where('orderId', $orderId)->with('LinesOrder')->with('LinesOrder.OrderCustomer')->with('ItemLinesOrder')->get();
        return $orderlines;   
    }
    public function postOrdersave(Request $request)
    {
      
        try{   
        
            $data =  $request->all('customerNo' , 'saleDate' ,'storeNo');
     
            if ($data) {
                $orders = Orders::create($data);
            }
            if ($request->isMethod('post')) {
                $OrderData = $request->all();
                foreach ($OrderData['data'] as $key => $value) {
                    $order = new order_lines;
                    $order->orderId = $value['orderId'] = $orders->id;
                    $order->itemNo= $value['itemNo'];
                    $order->quantity= $value['quantity'];
                    $order->unitPrice= $value['unitPrice'];
                    $order->subTotal= $value['subTotal'];
                    $order->save();
                }
                return response($orders->id);
                // return response()->json(['message'=>'Successfuly']);
            }
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}


