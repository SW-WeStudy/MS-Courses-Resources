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
        Schema::create('Note', function (Blueprint $table) {
            $table->bigIncrements('id_note');
            $table->string("content");
            $table->unsignedBigInteger('id_user');
            $table->integer("score")->nullable();
            $table->unsignedBigInteger("id_course");
            $table->foreign('id_course')->references('id_course')->on('Course');
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
        Schema::dropIfExists('Note');
    }
}
