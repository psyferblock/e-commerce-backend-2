<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Namshi\JOSE\Signer\OpenSSL\RSA;


Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'users'], function () {


    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/logout',[AuthController::class,'logout']);


    });
    Route::group(['prefix' => 'admin'], function () {


        Route::post('/login_admin',[AdminController::class,'loginAdmin']);
        Route::post('/register',[AuthController::class,'register']);
        Route::post('/logout',[AuthController::class,'logout']);
    
    
        });

    Route::group(['prefix' => 'admin'], function () {
        Route::post('/add_product',[ProductController::class,'addProduct']);
        Route::post('/update_product',[ProductController::class,'updateProduct']);
        Route::post('/delete_product',[ProductController::class,'DeleteProduct']);
        Route::get('/get_product',[ProductController::class,'getProductName']);
        Route::get('/get_likes',[Controller::class,'getLike']);

    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/get_product',[ProductController::class,'getProductName']);
       
            Route::post('/add_review',[ReviewController::class,'addReview']);
            Route::post('/like',[LikeController::class,'addLike']);

        Route::get('/call_review',[ReviewController::class,'callReview']);

    });
    
    

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//  initial version of the route 

// UserController php





Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
}); 