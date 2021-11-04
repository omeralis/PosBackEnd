<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Units;
class UnitsController extends Controller
{
    public function getUnits(){
        $units = Units::all();
        return  response()->json($units, 200);
    }
    public function postUnits(Request $request){
        $data = $request->all();
        if ($data) {
            $units = Units::create($data);
            return response()->json($units, 200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditIUnits(Request $request){
        $id = $request->id;  
        $units = Units::where('id', $id)->first();
        $data = $request->all();
        if (isset($units)) {
            $units->update($data);
            return response()->json($units,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
}
