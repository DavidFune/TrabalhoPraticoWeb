<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTablePacote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength('191');
        Schema::create('pacote', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',80)->nullable(false);
            $table->decimal('valor',10,2)->nullable(false);
            $table->date('dataInicio')->nullable(false);
            $table->date('dataFim')->nullable(false);
            $table->string('telefone',45);
            $table->string('urlImagem',150)->nullable(true);
            $table->text('descricao')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
