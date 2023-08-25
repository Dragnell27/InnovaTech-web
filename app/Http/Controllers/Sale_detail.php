<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Models\product;
use App\Models\Sales;
use App\Models\Sales_detail;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sale_detail extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sales = Sales::where('user_id',$id)->get();
        $arrSales = [];

        foreach ($sales as $sale){

            $details = Sales_detail::where('sale_id', $sale->id)->get();
            foreach ($details as $date){
             $producto = product::where('products.id',$date->product_id)
            ->get();
            $estado = Param::where('params.id',$date->param_status)->get();
            $fecha = Sales_detail::where('created_at',$date->created_at)->get();

                $arrSales[$sale->id][] = [
                    'id' => $date->id,
                    'sale_id' => $date->sale_id,
                    'producto' =>$producto[0]->name,
                    'imagen'=>$producto[0]->images,
                    'qty' => $date->qty,
                    'estado' =>$estado[0]->name,
                    'fecha' =>$fecha[0]->created_at,
                ];
            }
        }
        return $arrSales;
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
    }
}
