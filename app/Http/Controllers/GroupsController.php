<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
class GroupsController extends Controller
{
    public function getGroups(){
        $group = Groups::all('id','nameGroup');
        return response()->json($group,200);
    }
    public function getItemOfGroups(){
        $group = Groups::with('Items')->with('Items.StoreItem')->get();
        return response()->json($group,200);
    }
    
    public function postGroups(Request $request){
        $data =  $request->all();
        // $this->validate($request, [
        //     'group-name'  => 'required',
        //     ])
        if ($data) {
            $group = Groups::create($data);
            return response()->json($group ,200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    public function EditGroups(Request $request){
        $id = $request->id;  
        $group = Groups::where('id', $id)->first();
        $data = $request->all();
        if (isset($group)) {
            $group->update($data);
            return response()->json($group,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
}

