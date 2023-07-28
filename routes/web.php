<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
// use App\Http\Controllers\PqrsdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CarritoController;
use App\Http\Controllers\ParamController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('producto',[ProductosController::class,'producto'])->name('productos');

// Route::get('/pqrs', [PqrsdController::class, 'index'])->name('pqrs.index');
// Route::get('/pqrs/create', [PqrsdController::class, 'create'])->name('pqrs.create');
// Route::post('/pqrs', [PqrsdController::class, 'store'])->name('pqrs.store');

//Rutas del carrito//

Route::get("/cart-show",[App\Http\Controllers\CarritoController::class,'show'])->name("cart.show");
Route::delete("/destroy/{idProducto}",[App\Http\Controllers\CarritoController::class,'destroy'])->name("cart.destroy");
Route::post('/Cart-Checkout',[App\Http\Controllers\CarritoController::class,'store'])->name("cart.store");
Route::get("update-cart",[App\Http\Controllers\CarritoController::class,'updateCart'])->name("update-cart");
ROUTE::view('components/cart/cart-show','components/cart/cart-show');
///HASTA aqui//

/////////////////////////////
///   Rutas confirmadas   ///
/////////////////////////////

//Ruta de jaider, sirve para cargar los tipos de docuemnto en el registro
Route::post("document_types",[RegisterController::class, 'document_type'])->name("document_type");

//Ruta de jaider, permite iniciar sesion y acceser al registro
Auth::routes();

//Ruta de jaider, trae los municipios
Route::post('ciudades', [AddressController::class, 'cargarCiudades'])->name('cities');

//ruta de jaider, sirve para cerrar sesion.
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//ruta de jaider, agrupa todo el CRUD de direcciones
Route::middleware('auth')->resource('perfil/direcciones', AddressController::class);


//Camilo Alzate Ruta que llama el primer paso de compra
Route::view('payment-method/pasoUnoMpago','payment-method/pasoUnoMpago')->name('pasoUno');
//Ruta que llama Lugar de envio
Route::view('payment-method/lugarEnvio','payment-method/lugarEnvio')->name('LuEnvio');
//Ruta que llama Metodo de pago
Route::view('payment-method/Metodo-pago','payment-method/Metodo-pago')->name('Mpago');
//ruta ruta que llama Editar dirección
Route::view('payment-method/editarDireccion','payment-method/editarDireccion')->name('Edireccion');

route::view('products/singleProduct','products/singleProduct')->name('viewProdu');

//ruta jaider, manejo de usuarios;}
Route::resource('/users', UserController::class);

