<?php

namespace App\Http\Resources\faqs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class faqsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=> $this->id,
            "user_id"=> $this->user_id,
            "type"=> $this->param_type,
            "body"=>$this->body,
            "state"=>$this->param_state,
            "created"=>$this->created_at,
            "updated"=>$this->updated_at
        ];
    }
}
