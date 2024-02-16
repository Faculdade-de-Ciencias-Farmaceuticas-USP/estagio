<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_contatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('nome',150);
            $table->string('cargo',150);
            $table->string('rg',20);
            $table->string('cpf',150);
            $table->string('email',150);
            $table->string('telefone',15);
            $table->string('celular',15);
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->unique(['cpf','empresa_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('empresa_contatos');
        Schema::enableForeignKeyConstraints();
    }
}
