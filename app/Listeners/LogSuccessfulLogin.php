<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Http\Controllers\CarritoController;

use App\Models\sales_detail;
use App\Models\Sales;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //instacia del carrito
        $carrito = new CarritoController();



        //Guardado de productos sin registrarse
       if(Session::has("nolog")){
        $user_id = Auth::user()->id;

        // Session::put('cart',Session::get("nolog"));
        $itemsSession = json_decode(Session::get('nolog'));
    

        Cart::session($user_id)->clear();
        foreach ($itemsSession as $key => $value) {
        $id =$value->id;
               Cart::session($user_id)->add(array(
                  'id' => $value->id,   //inique row ID
                  'name' => $value->name,
                  'price' =>$value->price,
                  'quantity' => $value->quantity,
                  'attributes' => array(
                      'discount'=> $value->attributes->discount,
                      'image'=>$value->attributes->image,
                      'desc'=>$value->attributes->desc,
  
                  ),
              ));
          
          
          //guadado de los productos en la base de datos
          $direccion = \DB::table("address")->where("user_id",$user_id)->first();
          //Validar si el usuario ya tiene productos  en carrito
          $result = Sales::where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
          $direccionId;
          $direccionId = $direccion ? $direccionId = $direccion->id : $direccionId = null;
 

          //Mientras se arregla la base de datos debo crear una dirrecion
         if($result->isEmpty()) {
             $sale = new Sales;
             $sale->user_id = $user_id;

             $sale->address_id =$direccionId;
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

             //verificar si existe el producto
             $sale_id = Sales::select("id")->where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->get();
             //id de la compra

             $Sid= $sale_id[0]->id;
             $compras = sales_detail::where("sale_id",$Sid)->where("param_status",5)->get();

             $hasProduct = false;
             $total = 0;
             //todos los productos
             $updatedProducts = sales_detail::select("product_id","qty","products.name","products.price","products.discount","products.images","products.param_color","products.description")->join("products","products.id","=","sales_details.product_id")->where("sale_id",$Sid)->where("sales_details.param_status",5)->get();

             Session::put('msj', json_encode($updatedProducts));

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
        Sales::where("user_id",$user_id)->where("param_shipping",14)->where("param_status",5)->update(["total"=>$total]);

         }
            }
         Session::put("cart",Cart::session($user_id)->getContent());
          //borrado de la sesion
          Session::forget("nolog");

       }

       $carrito->mySales();

       ////mostrar productos guardados en mi carrito 
       if (Session::has("msj")) {
        $user_id = Auth::user()->id;
        $itemsSession = json_decode(Session::get('msj'));
            if ($itemsSession != null) {

                Cart::session($user_id)->clear();

                foreach ($itemsSession as $key => $value) {
                       Cart::session($user_id)->add(array(
                          'id' => $value->product_id,   //inique row ID
                          'name' => $value->name,
                          'price' =>$value->price,
                          'quantity' => $value->qty,
                          'attributes' => array(
                              'discount'=> $value->discount,
                              'image'=>$value->images,
                              'desc'=>$value->description,
          
                          ),
                      ));
                  }
                  Session::forget('cart');
                  Session::put("cart",Cart::session($user_id)->getContent());
                  Session::forget('msj');
            }
        
       
       }


    }
}
