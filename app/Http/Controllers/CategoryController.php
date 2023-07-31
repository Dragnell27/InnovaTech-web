<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\category\CategoryCollection;
use App\Http\Resources\category\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    { 
       return CategoryCollection::collection(DB::table("params")->where("paramtype_id","12")->where("param_state","5")->get());
        // return CategoryResource::collection(Category::all());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
       
        return  CategoryResource::collection(Category::where("param_category",$category)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
