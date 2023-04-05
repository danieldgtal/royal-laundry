<?php

namespace App\Models;

use App\Http\Livewire\Admin\Staffs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

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
