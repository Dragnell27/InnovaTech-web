<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Param;


class DepartmentController extends Controller
{
    public function nameDepartment($id){
        try{
            $department= Param::where('id',$id)->get();
        if($department){
        return response()->json(['departments'=>$department]);
        }else{
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Error en el servidor'], 500);
        }
         }
}
