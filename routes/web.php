<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DireccioneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PqrsdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CarritoController;
use App\Http\Controllers\PaiseController;
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

Route::get('producto',[ProductosController::class,'producto'])->name('productos');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('usuario',UsuarioController::class);
Route::resource('persona',PersonaController::class);

Route::get('/pqrs', [PqrsdController::class, 'index'])->name('pqrs.index');
Route::get('/pqrs/create', [PqrsdController::class, 'create'])->name('pqrs.create');
Route::post('/pqrs', [PqrsdController::class, 'store'])->name('pqrs.store');

Route::get('/iniciar_sesion', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'index'])->name('registro');

// rutas de perfil
//carga departamentos a elegir un pais.
Route::post('departamentos',[PaiseController::class, 'obtenerDepartamento'])->name('departamentos');

//carga municipios a elegir un departamento.
Route::post('municipios',[PaiseController::class, 'obtenerMunicipios'])->name('municipios');


//carga las direcciones del usuario.
Route::get('/perfil/direcciones',[DireccioneController::class, 'index'])->name('direcciones');

//lleva al formulario para crear direcciones
Route::get('/perfil/direcciones/create',[DireccioneController::class, 'create'])->name('direcciones.create');

//Guarda una nueva direccion.
Route::post('perfil/direcciones',[DireccioneController::class, 'store'])->name('direcciones.store');

//elimina una direccion.
Route::delete('/perfil/direcciones/{direccion}',[DireccioneController::class, 'destroy'])->name('direcciones.destroy');

//formulario para editar una direccion.
Route::get('/perfil/direcciones/{direccion}/edit',[DireccioneController::class, 'edit'])->name('direcciones.edit');

//actualizar una direccion
Route::patch('/perfil/direcciones/{direccion}',[DireccioneController::class, 'update'])->name('direcciones.update');

//Rutas del carrito

Route::get("/cart-show",[App\Http\Controllers\CarritoController::class,'show'])->name("cart.show");
Route::delete("/destroy/{idProducto}",[App\Http\Controllers\CarritoController::class,'destroy'])->name("cart.destroy");
Route::post('/Cart-Checkout',[App\Http\Controllers\CarritoController::class,'store'])->name("cart.store");

/////////////////////////////
///   Rutas confirmadas   ///
/////////////////////////////
Route::get('/', function () {
    return view('index');
});

Route::post("document_types",[RegisterController::class, 'document_type'])->name("document_type");

//carga los datos personales del usuario.
Route::get('/perfil/mis_datos',[UserController::class, 'show'])->name('my_data.show')->middleware('auth');

Auth::routes();
