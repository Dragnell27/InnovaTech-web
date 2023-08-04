<?php


namespace App\Http\Controllers;
use Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index()
    {
        //  $id = $request->id;
        // $producto = \DB::table('productos')->select('id','nombre_producto','precio_venta','descripcion')->where('id',30)-> get();
        // echo "id".$id;

        // return $producto;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
     //funcion para cambiar la cantidad del producto
    public function updateCart(Request $request){
        $id = $request->input("prod_id");
        $cantidad = $request->input("quantity");
        
        $producto = \DB::table('products')->where('id',$id)->first();
        $precio= $producto->price * $cantidad;
       
        if (Auth::check()) {
            $userId = Auth::user()->id;
            Cart::session($userId)->update($id,array(
                "quantity" =>array(
                   'relative' => false,
                   'value' => $cantidad
                ),
                "price"=> $precio
               
           ));
           session()->forget('cart');
           session(["cart"=>Cart::session($userId)->getContent()]);

            # code...
        }else{
            Cart::update($id,array(
                "quantity" =>array(
                   'relative' => false,
                   'value' => $cantidad
                ),
                "price"=> $precio
               
           ));
           session()->forget('cart');

           session(["cart"=>Cart::getContent()]);
        }
                
               
                
               
        //   return redirect()->route("/")->with("msj_exitoso",$producto);
         return back();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $id = $request->id;
         
       
         $producto = \DB::table('products')->where('id',$id)->first();
         
         
        try {
            if (Auth::check()) {
                $userId = Auth::user()->id;
                Cart::session($userId)->add(array(
                    'id' => $producto->id,   //inique row ID
                    'name' => $producto->name,
                    'price' =>$producto->price,
                    'quantity' => $request->quantity?$request->quantity:1,
                    'attributes' => array(
                        'discount'=> $producto->discount,
                        'image'=>$producto->images,
                        'desc'=>$producto->description,
                        
                    ),
                ));

            }else{
                Cart::add(array(
                    'id' => $producto->id,   //inique row ID
                    'name' => $producto->name,
                    'price' =>$producto->price,
                    'quantity' => $request->quantity?$request->quantity:1,
                    'attributes' => array(
                        'discount'=> $producto->discount,
                        'image'=>$producto->images,
                        'desc'=>$producto->description,
                        
                    ),
                ));
            }
        
           
        
            // session(["cart"=>Cart::getContent()]);
    
        } catch (\Throwable $th) {
           
            return back()->with("error","Tuvimos un error y no podemos enviar tu producto al carrito");
          
        }
      
          
            return back()->with("msj_exitoso", $producto);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        return view('components.cart.cart-show');   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
      
          if (Auth::check()) {
            $userId =   Auth::user()->id;
            Cart::session($userId)->remove($id);
            session()->forget('cart');
          }else{
            Cart::remove($id);
            session()->forget('cart');
          }
          
        return redirect()->route("cart.show")->with("msj_destroy","El elemento fue eliminado");
        
    }
}
