<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
          [
            'user_id' => 1,
            'branch_id' => 1,
            'customer_name' => 'John Doe',
            'order_date' => '2022-01-01',
            'pickup_date' => '2022-01-03',
            'delivery_date' => '2022-01-05',
            'payment_status' => 'paid',
            'order_status' => 'completed',
            'total_cost' => 250.00,
            'items' => json_encode([
                ['item_name' => 'Shirt', 'quantity' => 3, 'price' => 30.00],
                ['item_name' => 'Pants', 'quantity' => 2, 'price' => 50.00],
                ['item_name' => 'Socks', 'quantity' => 5, 'price' => 5.00],
            ]),
            'payment_proof' => 'path/to/payment_proof_1.jpg',
          ],
        ];

        $x = 0;
        while($x < 100){
          foreach($orders as $key => $value){
            Order::create($value);
            $x++;
        }
      };

    }
}
