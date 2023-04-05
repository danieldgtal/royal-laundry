<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('customer_name');
            $table->date('order_date');
            $table->date('pickup_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('order_status',['pending','processing','completed','cancelled']);
            $table->decimal('total_cost',10,2);
            $table->text('order_note')->nullable();
            $table->json('items');
            $table->string('payment_proof')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
