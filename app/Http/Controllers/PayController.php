<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PayController extends Controller
{
    public function save(Request $request){
        $details = json_decode($request->getContent(), true);
        File::put(storage_path('app/details.json'),json_encode($details, JSON_PRETTY_PRINT));
        return response()->json(['message'=>'Detalles guardados']);
    }
    public function mostrar(){
    $details = [];

    if (File::exists(storage_path('app/details.json'))) {
        $details = json_decode(File::get(storage_path('app/details.json')), true);
    }
    return response()->json($details);
    }
}
