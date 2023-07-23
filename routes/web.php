<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route\delete;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group( function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\BrandsController::class)->group(function () {
        Route::get('/brand', 'index');
        Route::get('/brand/create', 'create');
        Route::post('/brand', 'store');

        Route::get('/brand/{brand}/edit', 'edit');
        Route::put('/brand/{brand}', 'update');
        Route::delete('/brand/{brand}', 'destroy');
    });


    Route::controller(App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/product/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}/', 'update');     
        Route::get('products/{product_id}/delete','destroy');
        Route::get('product_image/{product_image_id}/delete','destroyImage');

        Route::delete('/products/{product}', 'destroy');
 
    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');   
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
        Route::delete('/category/{category}', 'destroy');
    });

   

    Route::controller(App\Http\Controllers\Admin\PostsController::class)->group(function () {
        Route::get('/posts', 'index');
        Route::get('/posts/create', 'create');
        Route::post('/posts', 'store');
        Route::get('/posts/{posts}/edit', 'edit');
        Route::put('/posts/{posts}', 'update');
        Route::delete('/posts/{posts}', 'destroy');
       
    });


    Route::controller(App\Http\Controllers\Admin\Highlighters::class)->group(function () {
        Route::get('/highlighter', 'index');
        Route::get('/highlighter/create', 'create');
        Route::post('/highlighter', 'store');
        Route::get('/highlighter/{highlighter}/edit', 'edit');
        Route::put('/highlighter/{highlighter}', 'update');
        Route::delete('/highlighter/{highlighter}', 'destroy');
    });


    Route::controller(App\Http\Controllers\Admin\EmployController::class)->group(function () {
        Route::get('/employ', 'index');      
        Route::get('/employ/create', 'create');  
        Route::post('/employ', 'store');
        Route::get('/employ/{employ}/edit', 'edit');
        Route::put('/employ/{employ}', 'update');
        Route::delete('/employ/{employ}', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\PagesController::class)->group(function () {
        Route::get('/pages', 'index');      
        Route::get('/pages/create', 'create');  
        Route::post('/pages', 'store');
        Route::get('/pages/{page}/edit', 'edit');
        Route::put('/pages/{page}', 'update');
        Route::delete('/pages/{page}', 'destroy');
    });


    Route::controller(App\Http\Controllers\Admin\SocialController::class)->group(function () {
        Route::get('/socialmedia', 'index');      
        Route::get('/socialmedia/create', 'create');  
        Route::post('/socialmedia', 'store');
        Route::get('/socialmedia/{socialmedia}/edit', 'edit');
        Route::put('/socialmedia/{socialmedia}', 'update');
        Route::delete('/socialmedia/{socialmedia}', 'destroy');
    });
 

});
