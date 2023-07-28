<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Commentresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            "comentario"=>$this->comments,
            "hora"=>$this->created_at,
            "estrellas"=>$this->starts,
        ];
    }
}
