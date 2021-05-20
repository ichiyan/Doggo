<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            // $table->string('fname', 150);
            // $table->string('mname', 5);
            // $table->string('lname', 150);
            $table->date('birthdate');
            $table->string('username', 150);
            $table->string('address', 100);
            // // $table->string('city', 50);
            // // $table->string('province', 50);
            // // $table->integer('zipCode');
            $table->string('bio', 500);
            $table->string('profile_pic', 200);
            $table->string('contact_number', 30);
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->boolean('is_admin')->default(false);
            $table->foreignId('pcci_member_id')->nullable()->constrained('pcci_members', 'id');
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
        Schema::dropIfExists('user_profiles');
    }
}
