<?php

namespace App\Http\Resources\category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray( Request $request): array
    {
        return [
            
            'name'=> $this->name,
            "desc"=>$this->description,
            "price" => $this->price,
            "images" =>[
                $this->images,
            ],
            "colors"=>[
                $this->param_color
            ]  

        ];
    }
}
