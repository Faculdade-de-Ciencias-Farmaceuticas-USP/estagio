<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->integer('prazo_dias_parecer_comissao');
            $table->integer('prazo_dias_parecer_supervisor');
            $table->integer('prazo_dias_retorno_documentos');
            $table->integer('prazo_antecedencia_estagio');
            $table->integer('duracao_anos_convenio');
            $table->string('email_convenio',150);
            $table->string('email_estagio_envio',150);
            $table->string('email_relatorios_termos',150);
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
        Schema::dropIfExists('parametros');
    }
}
