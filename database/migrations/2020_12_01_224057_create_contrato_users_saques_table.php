<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoUsersSaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_users_saques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('saque')->nullable();
            $table->string('status_saque')->nullable();
            $table->string('solicitacao')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->foreign('contrato_id')->references('id')->on('contrato_users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_users_saques');
    }
}
