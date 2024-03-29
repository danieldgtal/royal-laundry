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
          'name' => 'Ajah Office',
          'email' => 'ajahoffice@deroyalchoiceng.com',
          'address' => '3 Tony Eigbokhan street, Majek Bus-Stop Abijo Lekki-Epe Expressway',
          'phone' => '08109787915',
        ],
        [
          'name' => 'Mainland Office',
          'email' => 'mainlandoffice@deroyalchoiceng.com',
          'address' => '344 Durban road beside AMC Hospital Amuwo odofin',
          'phone' => '07045529886',
        ],

      ]);
       
    }
}
