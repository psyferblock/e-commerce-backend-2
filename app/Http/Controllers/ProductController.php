<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    //
   public function addProduct(Request $request){


    $product = new Student;
    $product->name = $request->input('name');

    if($request->hasfile('image'))
    {
        $file = $request->file('image');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('uploads/students/', $filename);
        $product->image = $filename;
    }

    $product->save();
    return redirect()->back()->with('message','Student Image Upload Successfully');


}

    public function updateProduct(Request $request, $id){

    
        $product = Product::find($id);

        $product->name = $request->name;
        $product->email = $request->email;
        $product->course = $request->course;
        $product->section = $request->section;
        $product->save();

        return response()->json([
            "status"=>"success",
            "results"=>$product
        ],200);


    }

    public function deleteProduct(request $request,$id){
    
        
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            "status"=>"success",
            "results"=>$product
        ],200); 

        }


}

