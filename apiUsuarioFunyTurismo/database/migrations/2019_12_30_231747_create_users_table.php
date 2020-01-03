<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength('191');
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            //$table->Integer('idPacote')->default('0');
            $table->string('name');
            $table->string('email')->unique()->notNullable();
            $table->string('password',256);
            $table->string('api_token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
