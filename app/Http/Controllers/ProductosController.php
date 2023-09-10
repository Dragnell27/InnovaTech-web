<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Param;
use App\Models\Wishlist;
use App\Models\Sales;
use App\Models\sales_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function search(Request $request)
    {


        $query = $request['query'];
        $querys = explode(' ', $query);
        $arrayTags = [];

        $tags = Param::select('id')->where('name', 'LIKE', '%' . $query . '%')->where('paramtype_id', 9)->get();
        $category = Param::where('name', 'LIKE', '%' . $query . '%')->where('paramtype_id', 12)->value('id');
        $mark = Param::where('name', 'LIKE', '%' . $query . '%')->where('paramtype_id', 10)->value('id');

        foreach ($tags as $tag) {
            array_push($arrayTags, $tag->id);
        }

        $products = Product::query();
        $products = $products->where('param_state', 5);

        if (!empty($querys)) {
            $products = $products->where(function ($query) use ($querys) {
                foreach ($querys as $queryTerm) {
                    $query->orWhere('name', 'LIKE', '%' . $queryTerm . '%')
                        ->orWhere('description', 'LIKE', '%' . $queryTerm . '%');
                }
            });
        }

        if (!empty($arrayTags)) {
            $products = $products->whereIn('param_tags', $arrayTags);
        }

        if (!is_null($category)) {
            $products = $products->orWhere('param_category', $category);
        }

        if (!is_null($mark)) {
            $products = $products->orWhere('param_mark', $mark);
        }

        $products = $products->get();

        return view('result_search', compact('products'));
    }

    public function index()
    {
        $productos = Product::all();
        return view('index', compact('productos'));
    }

    public function sugerencias_busqueda()
    {
        $sugerencias = [];
        $busqueda = Param::whereIn('paramtype_id', [9, 10, 12])->get();
        $nameProducts = Product::all();

        foreach ($nameProducts as $name) {
            $sugerencias[] = ucfirst($name->name);
        }
        foreach ($busqueda as $name) {
            $sugerencias[] = ucfirst($name->name);
        }

        return response()->json(['success' => true, 'sugerencias' => $sugerencias]);
    }

    public function show($id)
    {
        $productos = Product::findOrFail($id);
        $colors = Param::where('paramtype_id', 11)->get();
        $favoritos = [];
        if (Auth::check()) {
            $favoritos = Wishlist::where('user_id', Auth::user()->id)->where('param_state',5)->get();
        }
        $comments = "";
        if (Auth::check()) {
            $comments = Comment::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        }
        return view('products.show_Product', compact('productos', 'colors', 'comments','favoritos'));
    }
}
