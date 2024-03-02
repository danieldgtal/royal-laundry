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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('invoice_type');
            $table->string('customer_name');
            $table->string('side_note')->nullable();
            $table->date('order_date');
            $table->date('invoice_date');
            $table->decimal('paid_amount',10,2);
            $table->decimal('balance_amount',10,2);
            $table->decimal('total_cost',10,2);
            $table->string('payment_method');
            $table->string('date_issued');
            $table->json('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
