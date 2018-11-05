<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSpecieFieldInCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characters', function (Blueprint $table) {
            //
            $table->dropColumn('specie');
            $table->unsignedInteger('specie_id')->after('name')->nullable();

            $table->foreign('specie_id')->references('id')->on('species');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->dropForeign('characters_specie_id_foreign');

            $table->dropColumn('specie_id');
            $table->string('specie', 50)->after('name')->nullable();
        });
    }
}
