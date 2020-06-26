<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCmdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmds', function (Blueprint $table) {
            $table->increments('numCommande');
            $table->unsignedInteger('numClient');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('adresseLiv');
            $table->string('type');
            $table->integer('realise');
            $table->string('secteur');
        });

        Schema::table('cmds', function (Blueprint $table) {
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
        Schema::dropIfExists('cmds');
    }
}
