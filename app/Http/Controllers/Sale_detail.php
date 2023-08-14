<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Sales;
use App\Models\sales_detail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Sale_detail extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $producto = Sales::join('sales_details', 'sales.id', '=', 'sales_details.sale_id')
        ->join('products','sales_details.product_id', '=', 'products.id')
        ->select('sales.param_status','sales.created_at','products.name', 'products.images')->get();
        return response()->json($producto);
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
        //
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
