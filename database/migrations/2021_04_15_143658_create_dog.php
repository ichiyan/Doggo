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
        if (!Schema::hasTable('dog')) {
            Schema::create('dog', function (Blueprint $table) {
                $table->string('registered_number')->primary();
                $table->foreignId('dog_detail_id')->nullable()->constrained('dog_detail', 'dog_detail_id');
                $table->foreignId('dog_owner_id')->nullable()->constrained('users', 'user_id');
                $table->foreignId('dog_doc_id')->nullable()->constrained('dog_document', 'dog_doc_id');
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
        Schema::dropIfExists('dog');
    }
}
