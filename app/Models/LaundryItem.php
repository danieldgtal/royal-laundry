<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryItem extends Model
{
    use HasFactory;

    protected $fillable = [
      'item_id',
      'item_name',
      'item_category',
      'item_price',
      'package_unit',
      'created_at',
      'updated_at',
    ];

    
}
