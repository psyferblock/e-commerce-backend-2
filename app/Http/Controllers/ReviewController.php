<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    //add review function
    
    public function addReview(Request $request){

        $review=new Review ;

        $review->text=$request->text;
        $review ->product=$request->product;
        $review->name=$review->name;
        $review->save();


    }
    // call reviews function 

    public function callReviews(Request $request){
        
        $review=Review::all()
        ->where('name','=',$request->name)
        ->where('product','=',$request->product);
        return response()->json([
            "status" => "Success",
            "reviews" => $review
        ]);


    }
}
