<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('message')) {
            Schema::create('message', function (Blueprint $table) {
                $table->id('message_id');
                $table->foreignId('chat_room_id')->constrained('chat_room', 'chat_room_id');
                $table->foreignId('user_id')->constrained('users', 'user_id');
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
        Schema::dropIfExists('message');
    }
}
