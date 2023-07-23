<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BannerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\Api\BannerController::class)->group(function(){
    Route::get('banner', 'index');   
    //Route::get('banner/{id}', 'show');
    Route::get('banner/{identity}','show'); 
   
});

Route::controller(App\Http\Controllers\Api\BrandsController::class)->group(function(){
    Route::get('brands', 'index');  
    Route::get('brands/{identifier}','show'); 
//    Route::get('brands/{id}', 'show'); 
//    Route::get('brands/slug/{slug}','showBySlug');
});

Route::controller(App\Http\Controllers\Api\CategoryController::class)->group(function(){
    Route::get('category', 'index');  
    // Route::get('category/{id}', 'show'); 
    Route::get('category/{identiCat}','show'); 
});

Route::controller(App\Http\Controllers\Api\ProductController::class)->group(function(){
    Route::get('products', 'index');   
    //Route::get('products/{id}', 'show');
    Route::get('products/{identiPro}','show');
});
Route::controller(App\Http\Controllers\Api\ProductImageController::class)->group(function(){
    Route::get('product-image', 'index');   
     Route::get('product-image/{identiProimg}', 'show');
    
});
Route::controller(App\Http\Controllers\Api\Highlighters::class)->group(function(){
    Route::get('highlighter', 'index');   
    Route::get('highlighter/{id}', 'show');
});

Route::controller(App\Http\Controllers\Api\EmployController::class)->group(function(){
    Route::get('employ', 'index');   
    Route::get('employ/{id}', 'show');
});

Route::controller(App\Http\Controllers\Api\PagesController::class)->group(function(){
    Route::get('pages', 'index');   
    Route::get('pages/{id}', 'show');
});
Route::controller(App\Http\Controllers\Api\SocialController::class)->group(function(){
    Route::get('socialmedia', 'index');   
    Route::get('socialmedia/{id}', 'show');
});

Route::controller(App\Http\Controllers\Api\PostController::class)->group(function(){
    Route::get('posts', 'index');   
    Route::get('posts/{id}', 'show');
});





