<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaborador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('colaborador');

        Schema::create('colaborador', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('email', 250)->unique();
            $table->string('cpf', 45)->unique()->nullable();
            $table->string('rg', 45)->nullable();
            $table->date('nascimento')->nullable();
            $table->string('cep', 25)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->string('numero', 255)->nullable();
            $table->string('bairro', 255)->nullable();
            $table->string('cidade', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('telefone', 255)->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborador');
    }
}
