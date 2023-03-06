<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
      'staff_id',
      'branch_id',
      'firstname',
      'lastname',
      'email',
      'gender',
      'password',
    ];


}
