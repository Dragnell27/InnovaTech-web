<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function search(Request $request)
    {
        $query = $request['query'];
        $searchResults = product::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%');
        })->get();
        return view('products.search_results', compact('searchResults'));
    }

    public function index()
    {
        $productos = product::all();
        return view('index', compact('productos'));
    }

    public function show($id)
    {
        $productos = product::findOrFail($id);
        return view('products.show_Product', compact('productos'));
    }
}
