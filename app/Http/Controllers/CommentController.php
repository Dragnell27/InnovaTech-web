<?php

namespace App\Http\Controllers;

use App\Http\Resources\Commentcollection;
use App\Http\Resources\Commentresource;
use App\Models\Comment;
use Illuminate\Http\Request;
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
       // dd($request->all());
        $coments = new Comment;
        $coments->comments =$request->comments;
        $coments->starts =$request->starts;
        $coments->user_id =$request->user_id;
        $coments->product_id =$request->product_id;
        $coments->save();
        return $coments;
    }

    /**
     * Display the specified resource.
     */
    public function show($comment)
    {
        $result = Commentresource::collection(DB::table('ratings')->where('product_id',$comment)->get());
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Comment::findOrFail($id);
        $result->delete();
        return ("Eliminado correctamente");
    }
}
