<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'address_id'=>$this->address_id,
            'total'=>$this->total,
            'paymethode'=>$this->param_paymethod,
            'shipping'=>$this->param_shipping,
        ];
    }
}
