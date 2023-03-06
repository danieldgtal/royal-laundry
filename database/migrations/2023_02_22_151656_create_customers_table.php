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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->timestamps();

            // Define the foreign key
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
