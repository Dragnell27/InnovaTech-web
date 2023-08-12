<?php


namespace App\Http\Controllers;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\sales_detail;
use App\Models\Sales;
use App\Models\Address;

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

          $id = $request->input("id");
          $producto = \DB::table('products')->where('id',$id)->first();
        try{
             if (Auth::check()) {
                $user_id = Auth::user()->id;
             
                 Cart::session($user_id)->add(array(
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
                 
              
                 $direccion = \DB::table("address")->where("user_id",$user_id)->first();
                 //Validar si el usuario ya tiene productos  en carrito 
                 $result = Sales::where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
               
                if($result->isEmpty()) {
                    $sale = new Sales;
                    $sale->user_id = $user_id;
                    $sale->address_id =$direccion->id;
                    $sale->param_status = 5;
                    $sale->param_shipping = 14;
                    $sale->param_paymethod = 2285;
                    $sale->total = 1;
                    $sale->save();
        
                    $sale_id = Sales::select("id")->where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
        
                    $Sid= $sale_id[0]->id;
                   
                    $sale_details = new sales_detail;
                    $sale_details->sale_id = $Sid;
                    $sale_details->product_id = $id;
                    $sale_details->qty = 1;
                    $sale_details->param_status =5;
                    $sale_details->save();
        
                }else{
                    
                    $sale_id = Sales::select("id")->where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
                    
        
                    $Sid= $sale_id[0]->id;
                   
                    $sale_details = new sales_detail;
                    $sale_details->sale_id = $Sid;
                    $sale_details->product_id = $id;
                    $sale_details->qty = 1;
                    $sale_details->param_status = 5;
                  
        
                    $sale_details->save();
                  
                 
                }
                session(["cart"=>Cart::session($user_id)->getContent()]);
              
   

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
                 session(["cart"=>Cart::getContent()]);
                
             }
            
           
        
           
    
        } catch (\Throwable $th) {
            // return back()->with("error","Tuvimos un error y no podemos enviar tu producto al carrito");
            dd($th);
          
        }
        return response()->json([
            "msj_exitoso"=>$producto,
        ]);
        // return back()->with("msj_exitoso", $producto);
            
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
