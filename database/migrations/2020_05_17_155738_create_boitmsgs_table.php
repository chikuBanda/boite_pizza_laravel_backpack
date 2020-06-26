<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoitmsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boitmsgs', function (Blueprint $table) {
            $table->increments('idMsg');
            $table->unsignedInteger('numClient');
            $table->text('objet');
            $table->text('message');
            $table->integer('vu');
            $table->dateTime('date');
        });

        Schema::table('boitmsgs', function (Blueprint $table) {
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
        Schema::dropIfExists('boitmsgs');
    }
}
