<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //jaider
        $addresses = Address::where('user_id', Auth::user()->id)->with('city')->get();
        $deparments = Param::where('paramtype_id', 6)->get();
        return view('profile.address.index', compact('addresses'), compact('deparments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // jaider
        $deparments = Param::where('paramtype_id', 6)->get();
        return view('profile.address.create', compact('deparments'));
    }

    public function cargarCiudades(Request $request)
    {
        // jaider
        $cities = Param::where('param_foreign', $request->texto)->get();
        return response()->json(
            [
                'city' => $cities,
                'success' => true,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // jaider
        $datos = request()->except('_token', 'department');
        $datos['user_id'] = Auth::user()->id;
        Address::insert($datos);
        return redirect()->route('direcciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $address = Address::with('city')->findOrFail($id);
        $deparment = Param::find($address->city->param_foreign);
        $deparments = Param::where('paramtype_id', 6)->get();
        $data = [
            'address' => $address,
            'deparment' => $deparment,
        ];
        $cities = Param::where('paramtype_id', 7)->where('param_foreign', $data['deparment']['id'])->get();
        return view('profile.address.edit', compact('deparments'), compact('cities'))->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->hood = $request->input('hood');
        $address->address = $request->input('address');
        $address->floor = $request->input('floor');
        $address->param_city = $request->input('param_city');
        $address->save();
        return redirect()->route('direcciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // jaider
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('direcciones.index');
    }
}
