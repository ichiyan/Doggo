<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dog_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 250);
            $table->string('kennel_name', 250);
            $table->date('birthdate');
            $table->string('gender', 10);
            $table->string('breed', 100);
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
        Schema::dropIfExists('dog_details');
    }
}
