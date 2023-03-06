<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {   
      //Create Admin user
      DB::table('users')->insert([
        'name' => 'Yinka Ademola',
        'phone' => '09038177956',
        'email' => 'yinkaademol@gmail.com',
        'password' => Hash::make('admin123'),
        'user_type' => '2',
      ]);
      // DB::table('admins')->insert([
      //   'name' => 'Yinka Ademola',
      //   'phone' => '09038177956',
      //   'email' => 'yinkaademol@gmail.com',
      // ]);

      //Create staff user
        DB::table('users')->insert([
          'name' => 'Daniel Chiatuiro',
          'phone' => '09038177956',
          'email' => 'danielchiatuiro@gmail.com',
          'user_type' => '1',
          'created_at' => now(),
          'updated_at' => now(),
          'password' => Hash::make('staff123'),          
        ]);
        // DB::table('staff')->insert([
        //   'firstname' => 'Daniel',
        //   'lastname' => 'Chiatuiro',
        //   'phone' => '09038177956',
        //   'email' => 'danielchiatuiro@gmail.com',
        //   'created_at' => now(),
        //   'updated_at' => now(),
        // ]);

        // Create regular users
        for($i = 1; $i <= 10; $i++){

          DB::table('users')->insert([
            'name' => 'Daniel Chiatuiro' .$i,
            'phone' => '09038177956' .$i,
            'email' => 'danielchiatuiro@gmail.com' .$i,
            'user_type' => '0',
            'created_at' => now(),
            'updated_at' => now(),
            'password' => Hash::make('user123'),  
          ]);

          DB::table('customers')->insert([
            'customer_id' => $i,
            'firstname' => 'Daniel' .$i,
            'lastname' => 'Chiatuiro' .$i,
            'phone' => '09038177956' .$i,
            'email' => 'danielchiatuiro@gmail.com' .$i,
            'created_at' => now(),
            'updated_at' => now(),
          ]);

        }
    }
}
