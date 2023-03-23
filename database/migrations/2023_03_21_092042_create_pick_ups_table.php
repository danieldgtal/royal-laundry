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
            $table->string('pickup_date');
            $table->text('pickup_items')->nullable();
            $table->integer('pickup_status');
            $table->text('pickup_note')->nullable();
            $table->timestamps();

            // Define the foreign key
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
