<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'order_id',
      'user_id',
      'branch_id',
      'customer_name',
      'order_date',
      'pickup_date',
      'delivery_date',
      'payment_status',
      'order_status',
      'total_cost',
      'items',
      'payment_proof',

    ];

}
