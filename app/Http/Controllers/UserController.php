<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Param;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function index()
    {
        $user = User::with('document')->get();
        // return UserCollection::collection($user);
        return $user;
    }
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document' => ['required', 'string', 'min:7', 'max:12'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10','max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'document_type' => ['required', 'integer'],
            'aceptarTerminos' => ['accepted'],
        ]);
        $suscripcion = $request['aceptarTerminos'] ? 20 : 21;
        $user = new User();
        $user->document = $request['document'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->param_type = $request['document_type'];
        $user->param_rol = 1;
        $user->param_suscription = $suscripcion;
        $user->param_state = 5;
        $user->save();
        Auth::login($user);
        return view('index');
    }

    /**
     * Display the resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('document')->get();
        // return UserCollection::collection($user);
        return $user;
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
