<?php

namespace Database\Seeders;

use App\Models\LaundryItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaundryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laundry_items = [
            [
            'item_name' => '3PCE SUIT',
            'item_category' => 'Men_Suits',
            'package_unit' => 3,
            'item_price' => 4500,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
              'item_name' => 'TRACK SUIT',
              'item_category' => 'Men_Suits',
              'package_unit' => 1,
              'item_price' => 4500,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'item_name' => '2PCE SKIRT SUIT',
              'item_category' => 'Skirt_Suits',
              'package_unit' => 2,
              'item_price' => 3800,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'item_name' => 'BLOUSE&WRAPPER',
              'item_category' => 'DC_Women_Natives',
              'package_unit' => 1,
              'item_price' => 1400,
              'created_at' => now(),
              'updated_at' => now(),
            ]
          
          ];

          foreach($laundry_items as $key => $value){
            LaundryItem::create($value);
          }
          
        
    }
}
