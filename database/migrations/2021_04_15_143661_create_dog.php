<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            // $table->integer('price');
            $table->string('registered_number', 20);
            $table->foreignId('dog_detail_id')->nullable()->constrained('dog_details', 'id');
            $table->foreignId('dog_owner_id')->constrained('user_profiles', 'id');
            $table->foreignId('dog_litter_id')->constrained('dog_litters', 'id');
            $table->boolean('is_Posted')->default(false);
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
        Schema::dropIfExists('dogs');
    }
}
