<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\category\CategoryCollection;
use App\Http\Resources\category\CategoryResource;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        return CategoryCollection::collection(DB::table("params")->where("paramtype_id", "12")->where("param_state", "5")->get());
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
    public function show($id)
    {

        try {
            $categoryData = Category::with('products')->where('param_category', $id)->get();
            $products = $categoryData;
            $categoryName = $categoryData->first();

            $favoritos = [];
            if (Auth::check()) {
                $favoritos = Wishlist::where('user_id', Auth::user()->id)->get();
            }

            return view('components.Categories.category', compact('products','favoritos','categoryName'));
        } catch (\Exception $e) {
            // Manejo del error
            dd($e->getMessage()); // Muestra el mensaje de error en la página
        }
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
