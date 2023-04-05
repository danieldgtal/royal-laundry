<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
      'invoice_id',
      'user_id',
      'branch_id',
      'customer_name',
      'order_date',
      'invoice_date',
      'total_cost',
      'payment_method',
      'date_issued',
      'items',
    ];
}
