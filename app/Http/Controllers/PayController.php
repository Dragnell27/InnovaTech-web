<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $sale_id = Sales::select("id")->where("user_id",$id)->where("param_shipping",14)->where("param_status",5)->get();
            $Sid= $sale_id[0]->id;
            return $Sid;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $cambio = 10;
        Sales::where("user_id", $id)->where("param_status",5)->where("param_shipping",14)
        ->update(["param_shipping" => $cambio]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
