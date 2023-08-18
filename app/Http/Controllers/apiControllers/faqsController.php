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
            return Param::select("name","id" )->where("paramtype_id",8)->get();
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
    public function store(Request $request)
    {
     

// Joan modifico esto
     $id = $request["client_id"];

        //  //jaider
        
          try {
          
            $request->validate([
                'type' => ['required', 'string', 'max:255'],// Joan modifico esto
                'body' => ['required', 'string'],// Joan modifico esto
            ]);
            $faqs = new faq();
            $faqs->user_id = $id;
            $faqs->param_type = $request['type']; // Joan modifico esto
            $faqs->body = $request['body'];
            $faqs->param_state = 10;
          
          // Joan modifico esto
            $faqs->save();
          } catch (\Throwable $th) {
            
          }
          
          return  back();

            



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
