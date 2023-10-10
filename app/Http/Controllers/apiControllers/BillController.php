<?php

namespace App\Http\Controllers\apiControllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\sales_detail;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
use Cart;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = "";
        $method="";
        $compra = false;
        $data = json_decode($request->getContent());
        if(isset($data->data->transaction->id)&&isset($data->data->transaction->status)){
            $status =$data->data->transaction->status;
            $method = $data->data->transaction->payment_method_type;
            $correo = $data->data->transaction->customer_email;
        }
        switch ($method) {
            case 'NEQUI':
                $type = 2276;
                break;
            case 'CARD':
                $type = 2277;
            default:
                $type = 2275;
                break;
        }

        if($status == "APPROVED"){
            $id = User::where('email',$correo)->first('id');
            $id_address = Address::where('user_id',$id)->first('address');
            $this->actualizar($id,$type,$id_address);
            $compra = true;
        }else if($status == "ERROR"){
            $compra = false;
        }
        if($compra == true){
            return response()->json(['message'=> 'Registro guardado correctamente'],200);
        }else{
            return response()->json(['message'=> 'Registro guardago correctamente'],400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $data =  BillResource::collection( Sales_detail::select("sales.id","products.name","products.price","products.discount","qty")
        ->join("sales","sales.id","=","sales_details.sale_id")
        ->join("products","products.id", "=","sales_details.product_id")
        ->where("sales_details.param_status",5)
        ->where("sales.param_status",5)
        ->where("sales.param_shipping",14)
        ->where("sales.user_id",$id)
        ->get());

        return $data;

    }
    public function actualizar($id,$type,$id_address){

        $method = 0;
        if($type == "2286"){
            $method = "2275";
        }else if($type == "2285"){
            $method = "2276";

        }
        Sales::where("user_id",$id)
        ->where("param_status",5)
        ->where("param_shipping",14)
        ->update([
            "param_shipping" => $type,
            "param_paymethod"=> $method,
            "param_status"=>10,
            "address_id"=>$id_address,
        ]);

        Session::forget("cart");
        Session::put('success_mjs','Su compra ha sido éxitosa');

        Cart::session($id)->clear();
        return redirect()->route("index");
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
    public function update(Request $request, String $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
