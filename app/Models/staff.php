<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $fillable = [
      'staff_id',
      'firstname',
      'lastname',
      'email',
      'gender',
      'branch_id',
      'staff_id',
    ];
}
