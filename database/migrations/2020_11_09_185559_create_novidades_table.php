<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novidades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50); 
            $table->string('sub_titulo', 30); 
			$table->string('descricao', 100);
			$table->string('descricao_longa', 600);
            $table->string('image', 100); 
            $table->string('descricao_media', 600)->nullable();
            $table->string('obs', 350);
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
        Schema::dropIfExists('novidades');
    }
}
