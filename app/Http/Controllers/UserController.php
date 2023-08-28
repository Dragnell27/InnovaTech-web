<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Validation\Rule;
use App\Models\Param;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function index()
    {
        // $addresses = Http::get(env('API'))."/users";
        $user = Http::get(env('API') . "/users");
        return view('index');
    }
    public function create()
    {
        $document_types = Param::where('paramtype_id', 15)->get();
        return view('auth.register', compact('document_types'));
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'número_de_documento' => ['required', 'numeric', 'digits_between:7,12'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
            'tipo_de_documento' => ['required', 'integer'],
            'aceptarTerminos' => ['accepted'],
        ]);

        $suscripcion = $request['accept_subscription'] ? 20 : 21;
        $user = new User();
        $user->document = $request['número_de_documento'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->param_type = $request['tipo_de_documento'];
        $user->param_rol = 1;
        $user->param_suscription = $suscripcion;
        $user->param_state = 5;
        $user->save();
        Auth::login($user);
        return redirect(route('index'));
    }

    /**
     * Display the resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('document_type')->first();
        return view('profile.personal_data.show', compact('user'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('document_type')->first();
        $document_types = Param::where('paramtype_id', 15)->get();
        return view('profile.personal_data.edit', compact('user'), compact('document_types'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'tipo_de_documento' => ['required', 'integer'],
        ]);

        $suscripcion = $request['accept_subscription'] ? 20 : 21;
        $user = User::findOrFail($id);
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->param_type = $request['tipo_de_documento'];
        $user->param_suscription = $suscripcion;
        $user->save();

        return redirect(route('users.show', Auth::user()->id));
    }

    public function UpdateUser(Request $request,$id){
try {
    $request->validate([
        'phone' => ['required', 'numeric', 'digits:10'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
    ]);
    $user = User::findOrFail($id);
    $user->phone = $request['phone'];
    $user->email = $request['email'];
    $user->save();
    return response()->json(['message'=>'Datos guardados'],200);
} catch (\Exception $e) {
   return response()->json(['error'=>$e->getMessage()],500);
}
    }
    /**
     * Remove the resource from storage.
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        if ($user->param_rol == 2) {
            return "no se puede eliminar la cuenta de administrador";
        } else {
            $newPassword = Str::random(10);
            $user->document = "user - " . $id;
            $user->first_name = "user - " . $id;
            $user->last_name = "user - " . $id;
            $user->phone = "user - " . $id;
            $user->email = "user - " . $id;
            $user->password = Hash::make($newPassword);
            $user->param_state = 6;
            $user->save();

            $address = Address::where('user_id', $id)->get();

            foreach ($address as $add) {
                $delete = Address::findOrFail($add->id);
                $delete->hood = "address - " . $add->id;
                $delete->address = "address - " . $add->id;
                $delete->floor = "address - " . $add->id;
                $delete->param_state = 6;
                $delete->save();
            }
            Auth::logout();
            return redirect(route('index'));
        }
    }

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return "cambio exitoso";
            return redirect()->back()->with('success', 'Contraseña cambiada exitosamente.');
        }
        return "cambio error";
        return redirect()->back()->withErrors(['old_password' => 'La contraseña antigua no es correcta.']);
    }
}
