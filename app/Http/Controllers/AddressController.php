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
        // $addresses = Http::get(env('API') . '/address/' . Auth::user()->id);
        $addresses = Address::where('user_id', Auth::user()->id)->with('city')->get();
        $filter = [];
        foreach ($addresses as $address) {
            if ($address['param_state'] == 5) {
                $filter[] = $address;
            }
        }
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

        $request->validate([
            'hood' => 'required',
            'address' => 'required',
            'floor' => 'required',
            'param_city' => 'required',' numeric',
            'department' => 'required ','numeric',
        ]);

        $datos = Address::where('user_id', Auth::user()->id)->where('param_state', 5)->get();
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
        $addresses = Address::where('user_id', $id)->with('city')->get();
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
        $department = Param::find($address->city->param_foreign);
        $departments = Param::where('paramtype_id', 6)->get();
        $data = [
            'address' => $address,
            'department' => $department,
        ];
        $cities = Param::where('paramtype_id', 7)->where('param_foreign', $data['department']['id'])->get();
        return view('profile.address.edit', compact('departments'), compact('cities'))->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hood' => 'required',
            'address' => 'required',
            'floor' => 'required',
            'param_city' => 'required',' numeric',
            'department' => 'required ','numeric',
        ]);

        $address = Address::findOrFail($id);
        $address->hood = $request->input('hood');
        $address->address = $request->input('address');
        $address->floor = $request->input('floor');
        $address->param_city = $request->input('param_city');
        $address->save();
        return redirect(route('direcciones.index'))->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // jaider
        $address = Address::findOrFail($id);
        $address->param_state = 6;
        $address->save();
        return redirect(route('direcciones.index'))->with('eliminar', 'ok');
    }
}
