<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create([
        'name' => 'Mens_Suit'
      ]);
    
      Category::create([
        'name' => 'Skirt_Suit'
      ]);
    
      Category::create([
        'name' => 'Mens_Cap'
      ]);
    }
}
