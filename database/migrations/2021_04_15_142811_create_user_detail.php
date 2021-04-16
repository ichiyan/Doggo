<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_detail')) {
            Schema::create('user_detail', function (Blueprint $table) {
                $table->id('user_detail_id');
                $table->foreignId('address_id')->nullable()->constrained('address', 'address_id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('profile_pic')->default('default-pic.png');
                $table->string('age');
                $table->char('gender');
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
        Schema::dropIfExists('user_detail');
    }
}
