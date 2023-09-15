<?php

namespace App\Http\Controllers\apiControllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\sales_detail;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
use Cart;
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
        //
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
    public function actualizar($id){

        Sales::where("user_id",$id)
        ->where("param_status",5)
        ->where("param_shipping",14)
        ->update(["param_shipping" => 10]);
        Cart::session($id)->clear();
        Session::forget("cart");
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
