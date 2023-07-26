<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "phone" => $this->phone,
            "email" => $this->email,
            "state" => $this->param_state,
            'document' => [
                "id" => $this->document->id,
                "name" => $this->document->name,
                "type_id" => $this->document->paramtype_id,
            ],
        ];
    }
}
