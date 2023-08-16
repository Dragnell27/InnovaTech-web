<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  protected $table = 'products';

  public function category()
  {
      return $this->belongsTo(Category::class, 'param_category', 'param_category'); // Cambiar a 'param_category'
  }

}
