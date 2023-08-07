<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressCollection;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Http;

class ApiAddress extends Controller
{
    public function index(){
        $addresses = Address::with('city')->get();
        return AddressCollection::collection($addresses);
    }

    public function show($id)
    {
        $addresses = Address::where('id', $id)->with('city')->get();
        return AddressCollection::collection($addresses);
    }

    public function direcciones($id)
    {
        $addresses = Address::where('user_id', $id)->with('city')->get();
        return AddressCollection::collection($addresses);
    }
}
