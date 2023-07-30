<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressCollection;
use App\Models\Address;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Http::get(env('API') . '/address/' . Auth::user()->id);
        $data = $addresses->json();
        $filter = [];
        foreach ($data['data'] as $address) {
            if ($address['state'] == 5) {
                $filter[] = $address;
            }
        }
        // dd($data);
        $deparments = Param::where('paramtype_id', 6)->get();
        return view('profile.address.index', compact('filter'), compact('deparments'));
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
        $datos = Address::where('user_id', Auth::user()->id)->get();
        if ($datos->count() >= 3) {
            session()->flash('message', [
                'text' => 'Ya has alcanzado el límite de direcciones.',
                'type' => 'warning',
            ]);
            return redirect()->route('direcciones.index');
        } else {
            $datos = request()->except('_token', 'department');
            $datos['user_id'] = Auth::user()->id;
            $datos['param_state'] = 5;
            Address::insert($datos);
            session()->flash('message', [
                'text' => 'Dirección guardada exitosamente.',
                'type' => 'success',
            ]);
            return redirect()->route('direcciones.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $addresses = Http::get(env('API') . '/address/' . $id);
        $data = [];
        foreach ($addresses as $address) {
            if ($address['param_state'] == 5) {
                $data[] = $address;
            }
        }
        return view('profile.address.show', compact('data'));
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
        session()->flash('message', [
            'text' => 'Dirección editada',
            'type' => 'success',
        ]);
        return redirect()->route('direcciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // jaider
        $address = Address::findOrFail($id);
        $address->hood = "address - " . $id;
        $address->address = "address - " . $id;
        $address->floor = "address - " . $id;
        $address->param_state = 6;
        $address->save();
        session()->flash('message', [
            'text' => 'Dirección eliminada',
            'type' => 'success',
        ]);
        return route('direcciones.index');
    }
}
