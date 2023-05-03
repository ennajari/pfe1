<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesponibilitesTable extends Migration
{
    public function up()
    {
        Schema::create('desponibilites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prof_id');

            $table->string('jour');
            $table->boolean('t8_10')->default(false);
            $table->boolean('t10_12')->default(false);
            $table->boolean('t14_16')->default(false);
            $table->boolean('t16_18')->default(false);

            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desponibilites');
    }
}
