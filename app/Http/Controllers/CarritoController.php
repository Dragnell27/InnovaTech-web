<?php

namespace App\Http\Controllers;

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
        $precio=$request->input("newPrice"); 
        // $producto = \DB::table('productos')->where('id',$id)->first();
  
                 Cart::update($id,array(
                     "quantity" =>array(
                        'relative' => false,
                        'value' => $cantidad
                     ),
                     "price"=> $precio
                    
                ));
                session()->forget('cart');
                session(["cart"=>Cart::getContent()]);
                
               
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
            Cart::add(array(
                'id' => $producto->id,   //inique row ID
                'name' => $producto->nombre_producto,
                'price' =>$producto->precio_venta,
                'quantity' => $request->quantity?$request->quantity:1,
                'discount'=> $producto->discount,
                'image'=>$producto->images,
                'desc'=>$producto->description,
    
            ));
            session(["cart"=>Cart::getContent()]);
    
        } catch (\Throwable $th) {
            return back()->with("error","Tuvimos un error y no podemos enviar tu producto al carrito");
        }
      

            return back()->with("msj_exitoso", $producto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('Cart-show');   
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
          Cart::clear();
          session()->forget('cart');
        return redirect()->route("cart.show")->with("msj_destroy","El carrito fue vaciado");
        
    }
}
