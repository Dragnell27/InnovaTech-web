<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Sales;
use App\Models\sales_detail;
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
        // $sales = Sales::where('user_id', Auth::user()->id)->get();
        // $arrSales = [];

        // foreach ($sales as $sale){

        //     $details = sales_detail::where('sale_id', $sale->id)->get();
        //     foreach ($details as $date){
        //         $arrSales[$sale->id][] = [
        //             'id' => $date->id,
        //             'sale_id' => $date->sale_id,
        //             'product_id' => $date->product_id,
        //             'qty' => $date->qty,
        //             'estado' => $date->param_status,
        //         ];
        //     }
        // }

        // dd(json_encode($arrSales));
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
    public function show(string $id)
    {
        $sales = Sales::where('user_id', Auth::user()->id)->get();
        $arrSales = [];

        foreach ($sales as $sale){

            $details = sales_detail::where('sale_id', $sale->id)->get();
            foreach ($details as $date){
                $arrSales[$sale->id][] = [
                    'id' => $date->id,
                    'sale_id' => $date->sale_id,
                    'product_id' => $date->product_id,
                    'qty' => $date->qty,
                    'estado' => $date->param_status,
                ];
            }
        }

        dd(json_encode($arrSales));
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
