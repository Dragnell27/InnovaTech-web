<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function getTotal($price, $discount){
        $total = $price;
        if ($discount > 0 ) {
            $disc = ($price * $discount)/100;
            $total = $price - $disc ; 
        }

        return  round($total,2);
    }
    
    public function toArray(Request $request): array
    {
       
        return [
            'bill_id'=>$this->id,
            'product_name'=>$this->name,
            'price'=>self::getTotal($this->price,$this->discount),
            'qty'=>$this->qty,
        ];
    }
}
