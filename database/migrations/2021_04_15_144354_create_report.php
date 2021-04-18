<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post', 'id');
            $table->foreignId('user_profile_id')->constrained('user_profile', 'id');
            $table->string('reason', 1000);
            $table->string('image', 1000)->nullable();
            $table->timestamps();
        });

        if (!Schema::hasTable('report')) {
            Schema::create('report', function (Blueprint $table) {
                $table->id('report_id');
                $table->foreignId('post_id');
                $table->foreignId('user_id');
                $table->string('reason');
                $table->string('image');
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
        Schema::dropIfExists('report');
    }
}
