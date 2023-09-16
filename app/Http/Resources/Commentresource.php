<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class Commentresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function bringName($id_user){
        $name ="";
        
        $datos = DB::table("users")->select("first_name")->where("id",$id_user)->first();
        

        return $datos->first_name;

    }
    public function toArray(Request $request): array
    {
      
        return  [
            "commentID"=>$this->id,
            "comentario"=>$this->comments,
            "hora"=>$this->created_at,
            "estrellas"=>$this->starts,
            "name"=>self::bringName($this->user_id),
            "userId" => $this->user_id,
        ];
    }
}
