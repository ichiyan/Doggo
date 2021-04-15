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
        if (!Schema::hasTable('post')) {
            Schema::create('post', function (Blueprint $table) {
                $table->id('post_id');
                $table->string('registered_number')->references('registered_number')->on('dog');
                $table->string('description');
                $table->float('price');
                $table->string('contact_num');
                $table->string('city');
                $table->string('category');
                $table->timestamps();
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
        Schema::dropIfExists('post');
    }
}
