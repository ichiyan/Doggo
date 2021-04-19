<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostRegular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_regular', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('regular_id')->constrained('regulars');

            // $table->integer('post_id')->unsigned()->index();
			// $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			// $table->integer('regular_id')->unsigned()->index();
			// $table->foreign('regular_id')->references('id')->on('regulars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('post_regular');
    }
}
