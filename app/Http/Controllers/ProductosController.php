<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\product;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function search(Request $request)
    {
        $query = $request['query'];
        $querys = explode(' ', $query);
        $arrayTags = [];

        $tags = Param::select('id')->where('name', 'LIKE', '%'.$query.'%')->where('paramtype_id', 9)->get();
        $category = Param::where('name', 'LIKE', '%'.$query.'%')->where('paramtype_id', 12)->value('id');
        $mark = Param::where('name', 'LIKE', '%'.$query.'%')->where('paramtype_id', 10)->value('id');

        foreach ($tags as $tag) {
            array_push($arrayTags, $tag->id);
        }

        $products = product::query();

        $products = $products->where('param_state', 5);

            for($i = 0; $i < count($querys); $i++) {
                $products = $products->orWhere('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('description', 'LIKE', '%' . $query . '%');
            }

            if(count($arrayTags) > 0) {
                for($i = 0; $i < count($arrayTags); $i++) {
                    $products  = $products->orWhere('param_tags', 'LIKE', '%' . $arrayTags[$i] . '%');
                }
            }

            if(!is_null($category)) {
                $products  = $products->orWhere('param_category', $category);
            }

            if(!is_null($mark)) {
                $products  = $products->orWhere('param_category', $mark);
            }

            $products = $products->get();
            //para traer un limite productos se usa paginate



        return view('result_search', compact('products'));
    }

    public function index()
    {
        $productos = product::all();
        return view('index', compact('productos'));
    }

    public function show($id)
    {

        $productos = product::findOrFail($id);
        $colors = Param::where('paramtype_id', 11)->get();
        $comments = Comment::join('users','users.id','ratings.user_id')->where('user_id',Auth::user()->id)->get();
        return view('products.show_Product', compact('productos','colors'));
    }
}
