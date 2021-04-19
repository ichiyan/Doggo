<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dog_litter_id')->constrained('dog_litters', 'id');
            $table->foreignId('post_type_id')->constrained('post_types', 'id');
            $table->string('post_title', 250);
            $table->string('post_description', 1000);
            $table->integer('price')->nullable();
            $table->string('status', 250);
            $table->integer('interests');
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
        Schema::dropIfExists('posts');
    }
}
