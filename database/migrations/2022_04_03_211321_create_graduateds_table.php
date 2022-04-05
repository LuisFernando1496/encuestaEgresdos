<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduateds', function (Blueprint $table) {
            $table->id();
            $table->string("enrollment",8)->unique();
            //  $table->boolean("sex");
             $table->date('date_graduate')->nullable();
            
            // $table->string("rfc")->nullable();
             //$table->string("curp")->nullable();
             $table->string("phone_house",10)->unique();
             $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('graduateds');
    }
}
