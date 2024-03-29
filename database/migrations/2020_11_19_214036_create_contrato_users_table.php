<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('valor');
            $table->string('saque')->nullable();
            $table->string('status')->nullable();
            $table->string('status_saque')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contrato_id')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_users');
    }
}
