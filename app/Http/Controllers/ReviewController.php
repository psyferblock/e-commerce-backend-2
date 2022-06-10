<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    //
    public function addReview(Request $request){

        $review=new Review ;
        $review->text=$request->text;
        $review ->product=$request->product;
        $review->name=$review->name;
        $review->save();


    }
    public function callReviews(Request $request,$name,$product){
        
        $review=Review::all()->where('name','=','$name')->where('product','=','$product')
    }
}
