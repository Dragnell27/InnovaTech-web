<?php

use App\Http\Controllers\apiControllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Sale_detail;
use App\Http\Controllers\Salescontroller as ControllersSalescontroller;
use App\Http\Controllers\PayController;

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
Route::get('/faqs/type/{type?}', [App\Http\Controllers\apiControllers\faqsController::class, "index"]);

Route::apiResource('/faqs','App\Http\Controllers\apiControllers\faqsController');


//@DarkJ


//@Dragnell
// api para las direcciones
Route::apiResource('/address','App\Http\Controllers\apiControllers\ApiAddress');
//api para los usuarios
Route::apiResource('/users','App\Http\Controllers\apiControllers\ApiUser');

//
Route::get('/address_user/{id}', [App\Http\Controllers\apiControllers\ApiAddress::class, "direcciones"]);
Route::get('/direccionesAdmin', [App\Http\Controllers\apiControllers\ApiAddress::class, "direccionesAdmin"]);

//@Jhonmurillo
//Api para los comentarios
// Route::apiResource('comentario', CommentController::class);
Route::apiResource('comment', CommentController::class);

//@Jhonmurillo
Route::apiResource('/sale', SalesController::class);
Route::apiResource('/shopping', Sale_detail::class);
Route::apiResource('pay', PayController::class);
