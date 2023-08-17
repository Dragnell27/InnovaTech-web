<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 protected $table ="products";
 public function products()
 {
     return $this->hasMany(Product::class, 'param_category', 'param_category'); // Cambiar a 'param_category'
 }

}
