<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignecommandes', function (Blueprint $table) {
            $table->increments('ligneID');
            $table->unsignedInteger('numCommande');
            $table->unsignedInteger('codeProduit');
            $table->double('prix');
            $table->integer('nb');
        });

        Schema::table('lignecommandes', function (Blueprint $table) {
            $table->foreign('numCommande')
                    ->references('numCommande')
                    ->on('cmds')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('codeProduit')
                    ->references('codeProduit')
                    ->on('produits')
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
        Schema::dropIfExists('lignecommandes');
    }
}
