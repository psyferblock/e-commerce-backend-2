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

    public function updateProduct(Request $request,$name){

    
        $product = Product::find($name);

        $product->name = $request->name;
        $product->email = $request->email;
        $product->price = $request->price;
        $product->image = $request->image;
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
            $product = Product::where("name",$name)
            ->get();
        }else{
            $product = Product::all();
        }
        
        return response()->json([
            "status" => "Success",
            "results" => $product
        ], 200);

    }
    
    public function getProductCategory(Request $request){
        
        

        if($request != null){
            $product = Product::where("category",$request->category)
            ->get();
        // }else{
            // $product = Product::all();
        }
        
        return response()->json([
            "status" => "Success",
            "results" => $product
        ], 200);

    }
}


