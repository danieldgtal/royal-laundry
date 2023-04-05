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
        Schema::create('staffs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('staff_id');
          $table->unsignedBigInteger('branch_id');
          $table->string('firstname');
          $table->string('lastname');
          $table->string('gender')->nullable();
          $table->string('email')->unique();
          $table->timestamps();

          // Define foreign key constraints
          $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
      });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
