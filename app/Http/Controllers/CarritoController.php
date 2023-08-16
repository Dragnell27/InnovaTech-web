<?php


namespace App\Http\Controllers;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\sales_detail;
use App\Models\Sales;
use App\Models\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index()
    {   
        
        Session::forget('msj_exitoso');
        return redirect()->back();
        //  $id = $request->id;
        // $producto = \DB::table('productos')->select('id','nombre_producto','precio_venta','descripcion')->where('id',30)-> get();
        // echo "id".$id;

        // return $producto;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request ){
        $producto  = $request->msj_exitoso;
        Session::put('msj_exitoso',$producto );
 
        return response()->json($producto);
        
        
    }
     //funcion para cambiar la cantidad del producto
    public function updateCart(Request $request){

        //id del producto
        $updatedProducts ;
        $id = $request->input("prod_id" );
        
        $cantidad = $request->input("quantity"); //cantidad actualizada
       
        $producto = \DB::table('products')->where('id',$id)->first(); //producto manipulado

        $precio = 0;
        if ($producto->discount > 0) {
            $descuento = ($producto->discount * $producto->price  )/ 100;
            $precio = ($producto->price  - $descuento) * $cantidad; //nuevo precio
        }else{
            $precio = $producto->price * $cantidad;
        }
   
        if (Auth::check()) {
            $userId = Auth::user()->id; //id el usuario
            //saca la direccion del usuario
            $direccion = \DB::table("address")->where("user_id",$userId)->first();
            $result = Sales::where("user_id",$userId)->where("param_shipping",14)->where("param_status",5)->get();

            $direccionId;

            if ($direccion) {
                $direccionId = $direccion->id;   
                # code...
            }else{
                $direccionId = null;
                   
                  }
                  
                //Aqui valido si el usuario ya tiene datos en el carrito
            if ($result->isEmpty()) {
          
                    $sale = new Sales;
                    $sale->user_id = $userId;
                    $sale->address_id =$direccionId ;
                    $sale->param_status = 5;
                    $sale->param_shipping = 14;
                    $sale->param_paymethod = 2285;
                    $sale->total = 1;
                    $sale->save();
        
                    $sale_id = Sales::select("id")->where("user_id",$userId)->where("param_shipping",14)->where("param_status",5)->get();
        
                    $Sid= $sale_id[0]->id;
                   
                    $sale_details = new sales_detail;
                    $sale_details->sale_id = $Sid;
                    $sale_details->product_id = $id;
                    $sale_details->qty = $cantidad;
                    $sale_details->param_status =5;
                    $sale_details->save();

              
            }else{

                $sale_id = Sales::select("id")->where("user_id",$userId)->where("param_shipping",14)->where("param_status",5)->get();
                //id de la compra
                $Sid= $sale_id[0]->id;

                    //Aqui se actualiza la compra del productto
                sales_detail::where("sale_id",$Sid)->where("product_id",$id)->where("param_status",5)->update(["qty" => $cantidad]);


                //Actualizar el total de compra
                $compras = sales_detail::where("sale_id",$Sid)->where("param_status",5)->get();
                $total = 0;
                foreach ($compras as $key => $value) {
                    $total += $value->qty;
                }
               Sales::where("user_id",$userId)->where("param_shipping",14)->where("param_status",5)->update(["total"=>$total]);

                
            $updatedProducts = sales_detail::select("product_id","qty","products.name","products.price","products.discount","products.images","products.param_color","products.description")->join("products","products.id","=","sales_details.product_id")->where("sale_id",$Sid)->where("sales_details.param_status",5)->get();
               

            }
      
          
            Cart::session($userId)->clear();
              foreach ($updatedProducts as $item) {
                   
                    Cart::session($userId)->add(array(
                        'id' => $item->product_id,   //inique row ID
                        'name' => $item->name,
                        'price' =>$item->price,
                        'quantity' =>$item->qty,
                        'attributes' => array(
                            'discount'=> $item->discount,
                            'image'=>$item->image,
                            'desc'=>$item->desc
                        ),
                    ));
                    
               
                # code...
              }
           
            Session::forget('cart');
           Session::put("cart",Cart::session($userId)->getContent());
         
      

            # code...
        }else{
            Cart::update($id,array(
                "quantity" =>array(
                   'relative' => false,
                   'value' => $cantidad
                ),
                
               
           ));
          
 
           Session::forget('cart');
           Session::put("cart",Cart::getContent());
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
               
                 //Mientras se arregla la base de datos debo crear una dirrecion
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

                    //verificar si exite el producto                    
                    $sale_id = Sales::select("id")->where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
                    //id de la compra

                    $Sid= $sale_id[0]->id;
                    $compras = sales_detail::where("sale_id",$Sid)->where("param_status",5)->get();

                    $hasProduct = false;
                    $total = 0;
                    
                    foreach ($compras as $key => $value) {
                        $total += $value->qty;
                        if($value->product_id == $id){
                            $hasProduct = true;
                        }
                    }

                    if ($hasProduct == true) {
                        $pcompra =  sales_detail::where("sale_id",$Sid)->where("param_status",5)->where("product_id",$id)->first();
                        $totalP = $pcompra->qty;
                        sales_detail::where("sale_id",$Sid)->where("param_status",5)->where("product_id",$id)->update([
                            "qty"=>$totalP+1,
                        ]);
                        $total+=1;
                       
                      
                    }else{
                        $sale_details = new sales_detail;
                        $sale_details->sale_id = $Sid;
                        $sale_details->product_id = $id;
                        $sale_details->qty = 1;
                        $sale_details->param_status = 5;
                        $sale_details->save();
               
                    }
                  

                    //Actualizar el total de compra
                // $compras = sales_detail::where("sale_id",$Sid)->where("param_status",5)->get();
               
               Sales::where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->update(["total"=>$total]);
                 
                 
                }
                // session(["cart"=>Cart::session($user_id)->getContent()]);
                Session::put("cart",Cart::session($user_id)->getContent());
   

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
                //  session(["cart"=>Cart::getContent()]);
                 Session::put("cart",Cart::getContent());
                
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
public function validarCompra($usuario){
$has = false;

    $result = Sales::where("user_id",$usuario)->where("param_shipping",14)->where("param_status",5)->get();
    if($result->isEmpty()) {
        $has = false;

    }else{
        $has= true;
    }
    return $has;

}
    /**
     * Display the specified resource.
     */
    public function show()
    {
        Session::forget('msj_exitoso');
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
            $userId = Auth::user()->id;
            Cart::session($userId)->remove($id);

            //sacar el id de una compra
            $sale_id = Sales::select("id")->where("user_id",$userId)->where("param_shipping",14)->where("param_status",5)->get();
            //id de la compra
            $Sid= $sale_id[0]->id;

            sales_detail::where("product_id",$id)->where("sale_id",$Sid)->update([
                "param_status"=>6,
            ]);
            
            Session::forget('cart');
          }else{
            Cart::remove($id);
            Session::forget('cart');
          }
          
        return redirect()->route("cart.show")->with("msj_destroy","El elemento fue eliminado");
        
    }
}
