<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /*
      conventions
      protected $table = 'customers' // if database table is different from model name
      protected $primaryKey = 'customer_id' // to change default primary key which is usually 'id' in db
      protected $timestamps = false // which is usually set to default of true
      protected $dateTime = 'U'; // changing laravel default datetime
      protected $connection = 'sqlite' // change default database driver
      protected $attributes = [ // change default attribute in database
        'is_published' => true, 
      ]

    */

    protected $fillable = [
      'customer_id',
      'firstname',
      'lastname',
      'email',
      'phone',
      'dob' ,
      'address' ,
      'city',
      'state',
      'gender',
  ];
}
