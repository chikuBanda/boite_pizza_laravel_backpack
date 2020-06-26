<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplignecmdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplignecmds', function (Blueprint $table) {
            $table->increments('idsuppligne');
            $table->unsignedInteger('numingred');
            $table->unsignedInteger('ligneID');
        });

        Schema::table('supplignecmds', function (Blueprint $table) {
            $table->foreign('numingred')
                    ->references('numingred')
                    ->on('suppliments')
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
        Schema::dropIfExists('supplignecmds');
    }
}
