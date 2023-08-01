<?php

namespace App\Http\Resources\products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class productResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        
        return [

            "id"=> $this->id,
            "name" => $this->name,
            "code" => $this->code,
            "desc" => $this->description,
            "discount"=> $this->discount,
            "price" => $this->price,
            "images"=>[
                $this->images
            ],
            "category" => $this->param_category,
            "colors" =>[
                $this->param_color
            ],
            "mark" => $this->param_mark,
            "tags" => $this->param_tags
        ];
    }
}
