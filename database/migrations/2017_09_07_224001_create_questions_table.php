<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('career_id')->default(0);
            $table->integer('grade_id')->default(0);
            $table->integer('area_id')->default(0);
            $table->string('code')->unique();
            $table->string('name');
            $table->string('picture')->nullable();
            $table->text('content')->nullable();
            $table->string('option_a')->nullable();
            $table->string('option_b')->nullable();
            $table->string('option_c')->nullable();
            $table->string('option_d')->nullable();
            $table->integer('correct')->default(1);
            $table->float('rank')->default(0);
            $table->integer('level')->default(0);
            $table->integer('time')->default(0);
            $table->string('tags')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
