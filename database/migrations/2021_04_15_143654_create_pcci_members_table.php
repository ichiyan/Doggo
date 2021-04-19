<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcciMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcci_members', function (Blueprint $table) {
            $table->id();
            $table->string('citizenship', 150);
            $table->string('educational_attainment', 200);
            $table->string('employment', 200);
            $table->string('employer_name', 150);
            $table->string('employer_address', 500);
            $table->boolean('isInterestedInDogShows');
            $table->boolean('isVolunteer');
            $table->foreignId('user_profile_id')->constrained('user_profiles', 'id');
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
        Schema::dropIfExists('pcci_members');
    }
}
