<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function addLike($like){
        if ($like=1){
            return response()->json([
                'status'='success',
                'result'= $like

            ])
           
        }
        return response()->json([
            'status'='failed'
        ])
        
    }
    
}
