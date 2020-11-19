<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image', 100);
            $table->string('titulo');
            $table->string('rentabilidade_alvo')->nullable();
            $table->string('sub_titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('descricao_longa')->nullable();
            $table->text('body_3');
            $table->text('body');
            $table->text('body_2')->nullable();
            $table->unsignedBigInteger('contrato_setor_id');
            $table->string('valor_captado')->nullable();
            $table->string('valor_cota');
            $table->string('participacao')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('contrato_setor_id')->references('id')->on('contrato_setors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
