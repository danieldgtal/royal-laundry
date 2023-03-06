<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LaundryItem;
use Illuminate\Database\Seeder;
use Database\Seeders\StaffMemberSeeder;
use Database\Factories\LaundryItemFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // LaundryItem::factory(100)->create();
      $this->call(UsersTableSeeder::class);
      $this->call(BranchSeeder::class);
      $this->call(StaffMemberSeeder::class);
      $this->call(LaundryItemSeeder::class);

      
    }
}
