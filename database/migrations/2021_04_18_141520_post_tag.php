<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('tag_id')->constrained('tags');
            $table->timestamps();

            // $table->integer('post_id', true, true)->unsigned()->index();
			// $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			// $table->integer('tag_id')->unsigned()->index();
			// $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('post_tag');
    }
}
