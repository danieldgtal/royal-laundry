<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'session_id',
      'item_id',
      'quantity',
      'created_at',
      'updated_at',
    ];
}
