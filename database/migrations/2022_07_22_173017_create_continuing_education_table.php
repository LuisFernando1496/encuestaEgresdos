<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinuingEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continuing_education', function (Blueprint $table) {
            $table->id();
            $table->text('name_courses');
            $table->date('fecha_courses');
            $table->longText('description');
            $table->text('place');
            $table->text('cel_phone');
            $table->longText('image');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('continuing_education');
    }
}
