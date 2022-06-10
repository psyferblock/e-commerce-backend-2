<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function addAdmin(Request $request){
        $admin =new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=$request->password;
        $admin->save();

    }
    public function signUp(Request $request){
        $user=new Admin;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json([
            "status" => "Success",
            "results" => $user,
        ], 200);
    }
}
