<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Sales;
use App\Models\Sales_detail;
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
        // $arrSales = [];
        $producto = product::join('sales_details', 'products.id','=','sales_details.product_id')
        ->select('name')
        ->get();

        foreach ($sales as $sale){

            $details = Sales_detail::where('sale_id', $sale->id)->get();
            foreach ($details as $date){
                switch ($date->param_status) {
                    case '10':
                       $estado = "Pendiente";
                        break;

                    case '11':
                        $estado = "Cancelado";
                        break;

                    case '12':
                        $estado = "Entregado";
                        break;

                    case '13':
                        $estado = "Recibido";
                        break;

                    default:
                        break;

                }

                $arrSales[$sale->id][] = [
                    'id' => $date->id,
                    'sale_id' => $date->sale_id,
                    'producto' =>$date->product_id,
                    'qty' => $date->qty,
                    'estado' =>$estado,
                ];
            }
        }
        return json_encode($arrSales);
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
