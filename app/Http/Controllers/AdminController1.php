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
    public function signup(Request $request){
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
   
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Admin::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Admin::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }
}
