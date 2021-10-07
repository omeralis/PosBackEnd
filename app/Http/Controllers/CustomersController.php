<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
class CustomersController extends Controller
{
    public function getCustomer(){
        $customer = Customers::all('id' ,'customerName' , 'phone' , 'other');
        return  response()->json($customer, 200);
    }
    public function postCustomer(Request $request){
        $data =  $request->all();
        $this->validate($request, [
            'customerName'  => 'required',
            'phone'  => 'required',
        ]);
        if ($data) {
            $customer = Customers::create($data);
            return response()->json($customer ,200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditCustomer(Request $request){
        $id = $request->id;  
        $customer = Customers::where('id', $id)->first();
        $data = $request->all();
        if (isset($customer)) {
            $customer->update($data);
            return response()->json($customer,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
    }
}

