<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('codeProduit');
            $table->string('nom');
            $table->float('prix', 5, 2);
            $table->float('remise', 3, 2)->default(0);
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->integer('isPromo');
            $table->text('imgPath');
        });

        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedInteger('catID');

            $table->foreign('catID')->references('catID')->on('catproduits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
