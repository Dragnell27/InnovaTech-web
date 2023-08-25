<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ParamController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\apiControllers\faqsController;
// use App\Http\Controllers\PqrsdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Auth;
use App\Models\Param;
use App\Models\Product;
use App\Models\Wishlist;
use App\Http\Controllers\CategoryController;

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

/// RUTAS DE PQRS

Route::get('/faqs', function () {
    return view('components.PQRS.FAQS');
})->name('faqs');


///AQUI ACABAN LAS RUTAS DE PQRS

// Route::get('/pqrs', [PqrsdController::class, 'index'])->name('pqrs.index');
// Route::get('/pqrs/create', [PqrsdController::class, 'create'])->name('pqrs.create');
// Route::post('/pqrs', [PqrsdController::class, 'store'])->name('pqrs.store');
//RUTA INDIVIDUAL DE PRODUCTOS//
Route::get('productos/{id}', [ProductosController::class , 'show'])->name('productos.show');

//Rutas del carrito//

Route::get("/cart-forget",[App\Http\Controllers\CarritoController::class,'index'])->name("cart.forget");
Route::get("/cart-show",[App\Http\Controllers\CarritoController::class,'show'])->name("cart.show");
Route::get("/cart-added",[App\Http\Controllers\CarritoController::class,'create'])->name("cart.add");
Route::get("/destroy/{idProducto}",[App\Http\Controllers\CarritoController::class,'destroy'])->name("cart.destroy");
Route::POST('/Cart-Checkout',[App\Http\Controllers\CarritoController::class,'store'])->name("cart.store");
Route::get("update-cart",[App\Http\Controllers\CarritoController::class,'updateCart'])->name("update-cart");
ROUTE::view('components/cart/cart-show','components/cart/cart-show') ->name('cart');
Route::POST("/mySales",[App\Http\Controllers\CarritoController::class,'mySales'])->name("my-sales");
///HASTA aqui//

/////////////////////////////
///   Rutas confirmadas   ///
/////////////////////////////
Route::get('/', function () {
    $products = Product::all();
    $colors = Param::where('paramtype_id', 11)->get();
    $favoritos = [];

    if (Auth::check()) {
        $favoritos = Wishlist::where('user_id', Auth::user()->id)->get();
    }
    return view('index',compact('products', 'colors', 'favoritos'));
})->name('index');

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
Route::get('/departments/{id}',[ParamController::class, 'nameDepartment']);
Route::get('/type_documents/{paramtype_id}',[ParamController::class,'tipoDocumet']);
Route::view('payment-method/1','payment-method/pasoUnoMpago')->name('pasoUno')->middleware('auth');
//Ruta que llama Metodo de pago
Route::view('payment-method/Metodo-pago','payment-method/Metodo-pago')->name('Mpago')->middleware('auth');


//ruta jaider, manejo de usuarios;}
Route::resource('/users', UserController::class);

//Ruta, manejo de compras
Route::view('/sales/shopping', 'sales/shopping')->name('shopping');

//ruta jaider, lista de deseos
Route::resource('/wishlist', WishlistController::class);

//ruta para faqs
// Route::post('/faqs/{id}', [faqsController::class, 'store'])->name('faqs.store');

//ruta para categorias
Route::view('components/Categories/category/{id}', 'components/Categories/category')
    ->where('id', '[0-9]+'); // Restringe el parámetro a valores numéricos



Route::get('api/category', [CategoryController::class, 'index'])->name('category.index'); // Devuelve todas las categorías
Route::get('api/category/{category}', [CategoryController::class, 'show'])->name('category.show'); // Devuelve productos de
//ruta para about
Route::view('about','about')->name('about');

//ruta help
Route::get('/help', function () {
    return view('help');
});

Route::resource('comentarios', CommentController::class);

//Rutas para cambiar contraseña
Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
Route::get('/form_password', function () {
    return view('profile.contrasena.update');
})->name('cambiar_contrasena')->middleware('auth');

// algoritmo de busqueda, debe recibir formulario donde el input tenga el name query
Route::post('/search', [ProductosController::class, 'search'])->name('products.search');


//@DARKJ

//Rutas de contact

Route::get('/contact', function () {
    return view('components.Contact.contact');
})->name('contact');

//@endDarkj

Route::resource('/shopping', SalesController::class);

//ruta para sugerencias de busqueda
Route::get('/sugerencias', [ProductosController::class, 'sugerencias_busqueda'])->name('sujerencias.busqueda');
