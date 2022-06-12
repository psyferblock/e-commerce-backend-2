<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //add like function

    public function addLike($like){
        if ($like==1){
            return response()->json([
                'status'=>'success'

            ]);
        }
        
        return "false";
        
        
    }
    // get like function 
    
    public function getLike(Request $request){
        $like=Like::all()
        ->where('name','=',$request->name)
        ->where('product','=',$request->product);
        return response()->json([
            "status" => "Success",
            "reviews" => $like,
    ]);

    

}
}
