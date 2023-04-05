<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LaundryItem;
use Illuminate\Database\Seeder;
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
      $this->call(CategoriesTableSeeder::class);
      $this->call(ItemsTableSeeder::class);
      $this->call(StaffSeeder::class);
  
    }
}
