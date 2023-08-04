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
        $request->validate([
            'product_id'=>'required|exists:product_id',
            'comment'=>'required|string',
        ]);
        $user = auth()->user();
        $comments = new Comment();
        $comments->user_id = $user->id;
        $comments->comments=$request->input('comments');
        $comments->starts=$request->input('starts');
        
        $comments->save();

        return ('Comentario creado');

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
        $result->delete();
        return ("Eliminado correctamente");
    }
}
