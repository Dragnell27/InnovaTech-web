<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class ApiUser extends Controller
{
    public function index(){
        $user = User::with('document_type')->get();
        return UserCollection::collection($user);
        // return $user;
    }

    public function show($id){
        $user = User::where('id', $id)->with('document_type')->get();
        // return UserCollection::collection($user);
        return $user;
    }
}
