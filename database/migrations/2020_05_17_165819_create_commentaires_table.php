<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id_commentaire');
            $table->dateTime('date_up')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('texte');
            $table->unsignedInteger('codeProduit');
            $table->unsignedInteger('numClient');
        });

        Schema::table('commentaires', function (Blueprint $table) {
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
        Schema::dropIfExists('commentaires');
    }
}
