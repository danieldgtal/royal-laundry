<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUp extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'user_id',
      'pickup_id',
      'pickup_date',
      'pickup_items',
      'pickup_status',
      'pickup_note',
      'created_at',
      'updated_at',
    ];

}
