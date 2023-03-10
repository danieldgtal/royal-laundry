<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('branches')->insert([
        [
          'name' => 'Amuwo Odofin',
          'email' => 'amuwoodofin@dechoiceroyal.com',
          'address' => '28 amuwo odofin street',
          'phone' => '08022873600',
        ],
        [
          'name' => 'Lekki',
          'email' => 'lekki@dechoiceroyal.com',
          'address' => '28 lekki street',
          'phone' => '0809002002',
        ],

      ]);
          
      

       
    }
}
