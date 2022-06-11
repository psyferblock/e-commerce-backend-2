<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    //
   public function addProduct(Request $request){

    $product=new Product;
    $product->name=$request->name;
    $product->category=$request->category;
    $product->image=$request->image;
    $product->price=$request->price;
    $product->save();
    return response()->json([
        "status"=>"success",
        "products"=>$product
    ],200);
    

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

    public function deleteProduct(Request $request,$id=null,$name){
    
        if($product = Product::find($id)){

            $product->delete();
            return response()->json([
                "status"=>"success",
                "results"=>$product
            ],200);   
        }
        else if(
        $product = Product::find($name)){

        $product->delete();
        return response()->json([
            "status"=>"success",
            "results"=>$product
        ],200);  
        
    }
        

    }


    public function getProductName($name=null){
        
        if($name != null){
            $product = Product::find($name);
        }else{
            $product = Product::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $product
        ], 200);

    }
}

