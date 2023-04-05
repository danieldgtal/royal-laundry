<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
      //create categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //create items table
        Schema::create('items', function (Blueprint $table){
          $table->id();
          $table->string('name');
          $table->unsignedBigInteger('category_id');
          $table->string('package_unit');
          $table->decimal('price',8,2);
          $table->decimal('discounted_price',8,2)->nullable();
          $table->timestamps();

          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');

    }
};
