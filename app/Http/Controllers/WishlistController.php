<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->where("param_state",5)->with('productos')->get();
        return view('wishlist.show', compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $lista = new Wishlist();
            $lista->product_id = $request->input('product_id');
            $lista->user_id = Auth::user()->id;
            $lista->param_state = 5;
            $lista->save();

            $guardadoId = $lista->id;

            return response()->json(['success' => true, 'id' => $guardadoId]);
        }else{
            return route("login");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lista = wishlist::findOrFail($id);
        $lista->param_state = 6;
        $lista->save();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        } else {
            return redirect()->back()->with('eliminado', 'ok');
        }
    }
}
