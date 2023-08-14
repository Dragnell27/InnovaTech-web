<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_detail extends Model
{
    protected $table = 'sales_detail';

    public function productos()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function sales(){
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    // use HasFactory;
}
