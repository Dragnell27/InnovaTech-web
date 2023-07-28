<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//@DarkJ
//APi para categorias
Route::apiResource("/category",'App\Http\Controllers\CategoryController');
//api para productos
Route::apiResource('/products','App\Http\Controllers\apiControllers\productsController');

Route::apiResource('/faqs','App\Http\Controllers\apiControllers\faqsController');

//@DarkJ


Route::apiResource('/address','App\Http\Controllers\AddressController');

Route::apiResource('/users','App\Http\Controllers\UserController');


