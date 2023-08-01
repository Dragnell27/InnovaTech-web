<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\faqs\faqsResource;
use App\Models\faq;
use App\Models\Param;
class faqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = null)
    {
        if(isset($type)){
            return Param::select("name")->where("paramtype_id",8)->get();
        }else{
            return faqsResource::collection(faq::all());
        }


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
    public function store(Request $request,$id)
    {
        //jaider
        $request->validate([
            'tipo_faqs' => ['required', 'string', 'max:255'],
            'cuerpo' => ['required', 'numeric'],
        ]);
        $faqs = new faq();
        $faqs->user_id = $id;
        $faqs->param_type = $request['tipo_faqs'];
        $faqs->body = $request['cuerpo'];
        $faqs->save();
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return faqsResource::collection(faq::where("id",$id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
