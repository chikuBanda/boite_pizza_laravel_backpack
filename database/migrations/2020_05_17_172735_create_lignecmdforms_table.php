<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignecmdformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignecmdforms', function (Blueprint $table) {
            $table->increments('ligneID');
            $table->unsignedInteger('numCommande');
            $table->unsignedInteger('codeFormule');
        });

        Schema::table('lignecmdforms', function (Blueprint $table) {
            $table->foreign('numCommande')
                    ->references('numCommande')
                    ->on('cmds')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('codeFormule')
                    ->references('codeFormule')
                    ->on('formules')
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
        Schema::dropIfExists('lignecmdforms');
    }
}
