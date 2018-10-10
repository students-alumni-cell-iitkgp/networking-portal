<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('name');
            $table->text('email');
            $table->text('company');
            $table->text('designation');
            $table->text('address');
            $table->text('city');
            $table->text('country');
            $table->text('mobile');
            $table->text('dob');
            $table->text('hall');
            $table->text('dept');
            $table->text('yog');
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
}
