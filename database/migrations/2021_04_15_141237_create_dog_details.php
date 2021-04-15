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
        if (!Schema::hasTable('dog_detail')) {
            Schema::create('dog_detail', function (Blueprint $table) {
                $table->id('dog_detail_id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('age');
                $table->char('gender');
            });
        }
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
