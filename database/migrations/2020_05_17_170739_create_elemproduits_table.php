<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemproduits', function (Blueprint $table) {
            $table->increments('idElemProduit');
            $table->unsignedInteger('elementbase_numElem');
            $table->unsignedInteger('produit_codeProduit');
        });

        Schema::table('elemproduits', function (Blueprint $table) {
            $table->foreign('elementbase_numElem')
                    ->references('numElem')
                    ->on('elementbases')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('produit_codeProduit')
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
        Schema::dropIfExists('elemproduits');
    }
}
