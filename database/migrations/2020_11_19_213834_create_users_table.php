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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('banco')->nullable();
			$table->string('agencia')->nullable(); 
            $table->string('conta_corrente')->nullable();
            $table->string('digito')->nullable();
            $table->string('image')->nullable();
			$table->string('nascimento')->nullable(); 
			$table->string('genero')->nullable();
			$table->string('cpf')->nullable();
			$table->string('rg')->nullable();
			$table->string('orgao')->nullable();
			$table->string('estado_civil')->nullable(); 
            $table->string('telefone')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable(); 
            $table->string('numero')->nullable(); 
            $table->string('complemento')->nullable(); 
            $table->string('bairro')->nullable(); 
            $table->string('cidade')->nullable(); 
            $table->string('estado')->nullable(); 
            $table->string('empresa')->nullable(); 
            $table->string('profissao')->nullable(); 
            $table->string('cargo')->nullable();
            $table->rememberToken();
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
