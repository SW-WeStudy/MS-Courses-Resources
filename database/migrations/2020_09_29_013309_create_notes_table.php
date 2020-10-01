<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('note')) {

        Schema::create('note', function (Blueprint $table) {
            $table->integer('id_note')->autoIncrement();
            $table->string("content");
            $table->integer('id_user');
            $table->integer("score")->nullable();
            $table->integer("id_course");
            $table->foreign('id_course')->references('id_course')->on('course');
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
        Schema::dropIfExists('note');
    }
}
