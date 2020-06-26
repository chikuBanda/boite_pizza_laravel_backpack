<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmdformligneproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmdformligneproduits', function (Blueprint $table) {
            $table->increments('idFormLigneProd');
            $table->unsignedInteger('ligneID');
            $table->unsignedInteger('codeProduit');
        });

        Schema::table('cmdformligneproduits', function (Blueprint $table) {
            $table->foreign('ligneID')
                    ->references('ligneID')
                    ->on('lignecmdforms')
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
        Schema::dropIfExists('cmdformligneproduits');
    }
}
