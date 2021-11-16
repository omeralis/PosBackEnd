<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
class ItemsController extends Controller
{
    public function getItem(){
        // $item = Items::all('id' ,'itemName' , 'groupNo');
        $item =  Items::with('Groups')->with('UnitsItem')->get();
        return  response()->json($item, 200);
    }
    public function postItem(Request $request){
        $data = $request->all();
        $this->validate($request, [
            'Image'  => 'required|image|mimes:jpg,jpeg,png,gif',
           ]);
            $Uploadimage = $request->file('Image');
            if ($Uploadimage) {
                $imageName =$request->itemName.rand() . '.' . $Uploadimage->getClientOriginalExtension();
                $path = 'images';
                $Uploadimage->move(public_path($path), $imageName);
                $data['Image']=url('/').'/'.$path.'/'.$imageName;
            }
        if ($data) {
            $item = Items::create($data);
            return response()->json($item, 200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditItems(Request $request){
        $id = $request->id;  
        $items = Items::where('id', $id)->first();
        $data = $request->all();
        if (isset($items)) {
            $items->update($data);
            return response()->json($items,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
}
