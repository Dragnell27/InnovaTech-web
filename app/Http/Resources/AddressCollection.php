<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressCollection extends JsonResource
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
            "user_id" => $this->user_id,
            "address" => $this->address,
            "floor" => $this->floor,
            "hood" => $this->hood,
            "state" => $this->param_state,
            'city' => [
                "id" => $this->city->id,
                "city_name" => $this->city->name,
                "foreign" => $this->city->param_foreign,
                "param_type" => $this->city->paramtype_id,
            ],
        ];
    }
}
