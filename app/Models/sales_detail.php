<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_detail extends Model
{

    public function productos()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function sales(){
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    // use HasFactory;
}
