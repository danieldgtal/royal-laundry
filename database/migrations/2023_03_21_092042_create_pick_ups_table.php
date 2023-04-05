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
      Schema::create('pick_ups', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->string('pickup_id');
          $table->unsignedBigInteger('branch_id');
          $table->string('pickup_date');
          $table->text('pickup_items')->nullable();
          $table->enum('pickup_status',['pending','processing','completed','cancelled']);
          $table->text('pickup_note')->nullable();
          $table->timestamps();

          // Define the foreign key
          $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pick_ups');
    }
};
