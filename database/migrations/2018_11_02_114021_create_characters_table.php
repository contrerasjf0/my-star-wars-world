<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('specie', 50);
            $table->enum('gender', ['male', 'female', 'other', 'n/a']);
            $table->integer('height');
            $table->string('eyes_color', 30);
            $table->string('skin_color', 30);
            $table->string('hair_color', 100);
            $table->string('birth_year', 30);
            $table->integer('mass');
            $table->text('image');
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
        Schema::dropIfExists('characters');
    }
}
