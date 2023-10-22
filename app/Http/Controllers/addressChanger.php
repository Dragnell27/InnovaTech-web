<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class addressChanger extends Controller
{
    public function index($address){
        
        Session::put("address",$address);
            return true;
    }
}
