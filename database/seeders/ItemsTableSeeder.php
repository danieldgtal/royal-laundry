<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $laundryCategory = Category::where('name', 'Mens_Suit')->first();
        
      Item::create([
          'name' => 'T-Shirt',
          'category_id' => $laundryCategory->id,
          'package_unit' => 1,
          'price' => 10.99
      ]);

      Item::create([
        'name' => 'Polo Shirt',
        'category_id' => $laundryCategory->id,
        'package_unit' => 2,
        'price' => 12.99
    ]);
    
    $groceryCategory = Category::where('name', 'Skirt_Suit')->first();

      Item::create([
        'name' => 'Bread',
        'category_id' => $groceryCategory->id,
        'package_unit' => 1,
        'price' => 3.99
    ]);
    
    Item::create([
        'name' => 'Milk',
        'category_id' => $groceryCategory->id,
        'package_unit' => 3,
        'price' => 2.99
    ]);
   
    }

  }
