<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemlignecmdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemlignecmds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numElem');
            $table->unsignedInteger('ligneID');
        });

        Schema::table('elemlignecmds', function (Blueprint $table) {
            $table->foreign('numElem')
                    ->references('numElem')
                    ->on('elementbases')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('ligneID')
                    ->references('ligneID')
                    ->on('lignecommandes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemlignecmds');
    }
}
