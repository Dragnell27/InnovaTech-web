<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\apiControllers\BillController;
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
use App\Models\Carrusel;
use App\Http\Controllers\PayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\facturas;

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
//ruta de about

Route::get('/aboutUs', function () {
    return view('aboutExample');
})->name('aboutUs');



//RUTA INDIVIDUAL DE PRODUCTOS//
Route::get('productos/{id}', [ProductosController::class, 'show'])->name('productos.show');

//Rutas del carrito//

Route::get("/cart-forget", [App\Http\Controllers\CarritoController::class, 'index'])->name("cart.forget");
Route::get("/cart-show", [App\Http\Controllers\CarritoController::class, 'show'])->name("cart.show");
Route::get("/cart-added", [App\Http\Controllers\CarritoController::class, 'create'])->name("cart.add");
Route::get("/destroy/{idProducto}", [App\Http\Controllers\CarritoController::class, 'destroy'])->name("cart.destroy");
Route::POST('/Cart-Checkout', [App\Http\Controllers\CarritoController::class, 'store'])->name("cart.store");
Route::get("update-cart", [App\Http\Controllers\CarritoController::class, 'updateCart'])->name("update-cart");
ROUTE::view('components/cart/cart-show', 'components/cart/cart-show')->name('cart');
Route::POST("/mySales", [App\Http\Controllers\CarritoController::class, 'mySales'])->name("my-sales");
///HASTA aqui//

/////////////////////////////
///   Rutas confirmadas   ///
/////////////////////////////
Route::get('/', function () {
    $products = Product::where("param_state", 5)->paginate(10);
    $colors = Param::where('paramtype_id', 11)->get();
    $carrusel = Carrusel::orderBy('position')->where("param_state", 5)->get();
    $favoritos = [];

    if (Auth::check()) {
        $favoritos = Wishlist::where('user_id', Auth::user()->id)->where('param_state', 5)->get();
    }
    return view('index', compact('products', 'colors', 'favoritos', 'carrusel'));
})->name('index');

//Ruta de jaider, sirve para cargar los tipos de docuemnto en el registro
Route::post("document_types", [RegisterController::class, 'document_type'])->name("document_type");

//Ruta de jaider, permite iniciar sesion y acceser al registro
Auth::routes(['verify' => true]);

//Ruta de jaider, trae los municipios
Route::post('ciudades', [AddressController::class, 'cargarCiudades'])->name('cities');

//ruta de jaider, sirve para cerrar sesion.
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//ruta de jaider, agrupa todo el CRUD de direcciones
Route::middleware('auth')->resource('perfil/direcciones', AddressController::class);


//Camilo Alzate Ruta que llama el primer paso de compra
Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
Route::get('/departments/{id}', [ParamController::class, 'nameDepartment']);
Route::get('/type_documents/{paramtype_id}', [ParamController::class, 'tipoDocumet']);
//Camilo Alzate Ruta que llama el primer paso de compra
Route::post('/sendEmail/{id}', [UserController::class, 'enviarEmail']);
// Route::post('/sendEmail',function($id){
//     $email= User::where('id',$id)->value('email');
//     Mail::to($email)->send(new facturas);
// return response()->json(['enviado correctamente ']);

// })->name('sendEmail');
//Ruta que llama Metodo de pago
Route::view('payment-method/Metodo-pago', 'payment-method/Metodo-pago')->name('Mpago')->middleware('auth');

Route::get('payment-method/1', function () {
    $departaments = Param::where('paramtype_id', 6)->get();
    return view('payment-method/pasoUnoMpago', compact('departaments'));
})->name('Mpago')->middleware("auth");


//ruta jaider, manejo de usuarios;}
Route::resource('/users', UserController::class);

//Ruta, manejo de compras
Route::view('/sales/shopping', 'sales/shopping')->name('shopping');

//ruta jaider, lista de deseos
Route::get('/wishlist', [WishlistController::class, 'index'])->name("wishlist.index")->middleware("auth");
Route::post('/wishlist', [WishlistController::class, "store"]);
Route::delete('/wishlist/{id}', [WishlistController::class, "destroy"])->name("wishlist.destroy");

//ruta para faqs
// Route::post('/faqs/{id}', [faqsController::class, 'store'])->name('faqs.store');

//ruta para categorias
Route::view('components/Categories/category/{id}', 'components/Categories/category')
    ->where('id', '[0-9]+'); // Restringe el parámetro a valores numéricos



Route::get('api/category', [CategoryController::class, 'index'])->name('category.index'); // Devuelve todas las categorías
Route::get('api/category/{category}', [CategoryController::class, 'show'])->name('category.show'); // Devuelve productos de
//ruta para about
Route::view('about', 'about')->name('about');

//ruta help
Route::get('/help', function () {
    return view('help');
});

Route::resource('comentarios', CommentController::class);

//Rutas para cambiar contraseña
Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
Route::get('/form_password', function () {
    if (Auth::check()) {
        if (Auth::user()->email_verified_at == "") {
            return redirect()->route('verification.notice');
        }
    }
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
Route::post('/save-details', [PayController::class, 'save']);
Route::get('/get-details', [PayController::class, 'mostrar']);

//ruta de pago
Route::put('/pago/{id}', [PayController::class, 'update'])->name('pago.update');
Route::get('/shooping/{id}/{type}', [BillController::class, 'actualizar'])->name('shopping.actualizar');
