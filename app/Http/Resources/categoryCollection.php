<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class categoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
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
