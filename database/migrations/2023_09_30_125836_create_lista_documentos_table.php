<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_documentos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['EMPRESA','ESTAGIO','EQUIVALENCIA']);
            $table->string('documento',100);
            $table->text('descricao');
            $table->enum('periodicidade',['INICIAL','PERIODICO','OPCIONAL','FINAL']);
            $table->enum('prazo_unidade',['MES','ANO','SEMANAS','DIAS'])->nullable();
            $table->integer('prazo')->nullable();
            $table->date('prazo_final')->nullable();
            $table->boolean('gera_doc_word')->default(0);
            $table->boolean('sistema')->default(0);
            $table->string('nome_tabela_sistema',50)->nullable();
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
        Schema::dropIfExists('lista_documentos');
    }
}
