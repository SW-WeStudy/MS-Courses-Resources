<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCourseUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_course')) {

        Schema::create('user_course', function (Blueprint $table) {
            $table->integer('id_user_course')->autoIncrement();
            $table->integer('id_user');
            $table->integer('id_course');
            $table->foreign('id_course')->references('id_course')->on('course');
            $table->string("rol");
            $table->string("state");
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
        Schema::dropIfExists('user_course');
    }
}
