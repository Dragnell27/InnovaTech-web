<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Param;

class Address extends Model
{
    use HasFactory;
    // jaider
    protected $table = 'address';

    // jaider
    public function city()
    {
        return $this->belongsTo(Param::class, 'param_city');
    }
    // jaider
    public function deparment()
    {
        return $this->belongsTo(Param::class, 'param_foreign');
    }
}
