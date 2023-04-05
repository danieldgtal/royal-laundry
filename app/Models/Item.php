<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
      
      'name',
      'category_id',
      'package_unit',
      'discounted_price',
      'price',
      'created_at',
      'updated_at',
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
