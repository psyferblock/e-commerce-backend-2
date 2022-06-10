<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    public function signUp(Request $request){
        $user=new User;
        echo "$user";

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json([
            "status" => "Success",
            "results" => $user
        ], 200);
    }
}
