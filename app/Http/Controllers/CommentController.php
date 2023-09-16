<?php

namespace App\Http\Controllers;

use App\Http\Resources\Commentcollection;
use App\Http\Resources\Commentid;
use App\Http\Resources\Commentresource;
use App\Models\Comment;
use App\Models\product;
use COM;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Commentcollection::collection(DB::table('ratings')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'comment'=>'required|string',
        // ]);


        $product = $request['product_id'];
        $comments = new Comment();
        $comments->user_id = Auth::user()->id;
        $comments->product_id = $product;
        $comments->comments=$request->input('comment');
        $comments->starts=$request->input('starts');
        $comments->param_state = 5;

        $comments->save();
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show($comment)
    {
        $result = Commentresource::collection(DB::table('ratings')->where('product_id',$comment)->where("param_state", 5)->get());
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // $dato = Comment::findOrfail('id',$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Comment::findOrFail($id);
        $result->param_state = 6;
        $result->save();
        return ("Eliminado correctamente");
    }
}
