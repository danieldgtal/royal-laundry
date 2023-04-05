<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create staff user
        DB::table('staffs')->insert([
          'staff_id' => 1,
          'branch_id' => 1,
          'firstname' => 'Daniel',
          'lastname' => 'Chiatuiro',
          'gender' => 'male',
          'email' => 'danielchiatuiro@gmail.com',
          'created_at' => now(),
          'updated_at' => now(),
        ]);

         //Create staff user
         DB::table('staffs')->insert([
          'staff_id' => 2,
          'branch_id' => 2,
          'firstname' => 'Daniel',
          'lastname' => 'Chiatuiro',
          'gender' => 'male',
          'email' => 'danielchiatuiro@gmail.com1',
          'created_at' => now(),
          'updated_at' => now(),
        ]);

          //Create staff user
          DB::table('staffs')->insert([
            'staff_id' => 3,
            'branch_id' => 2,
            'firstname' => 'Daniel',
            'lastname' => 'Chiatuiro',
            'gender' => 'male',
            'email' => 'danielchiatuiro@gmail.com1',
            'created_at' => now(),
            'updated_at' => now(),
          ]);

           //Create staff user
           DB::table('staffs')->insert([
            'staff_id' => 4,
            'branch_id' => 1,
            'firstname' => 'Daniel',
            'lastname' => 'Chiatuiro',
            'gender' => 'male',
            'email' => 'danielchiatuiro@gmail.com1',
            'created_at' => now(),
            'updated_at' => now(),
          ]);
    }
}
