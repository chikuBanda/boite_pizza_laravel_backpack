<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('codeProduit');
            $table->unsignedInteger('numClient');
        });

        Schema::table('favoris', function (Blueprint $table) {
            $table->foreign('codeProduit')
                    ->references('codeProduit')
                    ->on('produits')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('numClient')
                    ->references('numClient')
                    ->on('clients')
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
        Schema::dropIfExists('favoris');
    }
}
