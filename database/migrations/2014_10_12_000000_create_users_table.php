<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->default(0);
            $table->integer('institution_id')->default(0);
            $table->integer('career_id')->default(0);
            $table->integer('grade_id')->default(0);
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('User');
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->default('Male');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->float('rank')->default(0);
            $table->boolean('subscribed')->default(true);
            $table->boolean('active')->default(false);            
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
