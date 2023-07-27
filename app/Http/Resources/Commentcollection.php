<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Commentcollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" =>$this->id,
            "ususario" =>$this->user_id,
            "producto" =>$this->product_id,
            "comentario"=>$this->comments,
            "hora"=>$this->created_at,
            "estrellas"=>$this->starts,
        ];
    }
}
