<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    public function signUp(Request $request){
        $user=new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json([
            "status" => "Success",
            "results" => $user
        ], 200);
    }
    public function addAdmin(Request $request){
        $admin =new User;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=$request->password;
        $admin->save();

    }
}
