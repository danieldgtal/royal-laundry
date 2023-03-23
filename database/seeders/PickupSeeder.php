<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PickUp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pickup_items = [
          [
            'user_id' => 1,
            'pickup_id' => 'PU001',
            'pickup_date' => Carbon::now()->addDays(2),
            'pickup_items' => 'Cloths, towel, and socks',
            'pickup_status' => 0,
            'pickup_note' => 'Please call before arriving.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ],
          [
            'user_id' => 1,
            'pickup_id' => 'PU002',
            'pickup_date' => Carbon::now()->addDays(5),
            'pickup_items' => 'shoes and bags',
            'pickup_status' => 1,
            'pickup_note' => 'Look for the red car in the parking lot.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ],
          [
            'user_id' => 1,
            'pickup_id' => 'PU003',
            'pickup_date' => Carbon::now()->addDays(3),
            'pickup_items' => 'singlet and handkerchief',
            'pickup_status' => 2,
            'pickup_note' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ],

        ];
        $x = 0;
        while($x < 100){
          foreach($pickup_items as $key => $value){
            PickUp::create($value);
            $x++;
          }
        };
       
        
    }
}
