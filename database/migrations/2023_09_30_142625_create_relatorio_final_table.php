<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatorioFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorio_final', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estagio_id');
            $table->unsignedBigInteger('comissao_estagio_id');
            $table->text('introducao');
            $table->text('objetivo');
            $table->text('metodologia_material');
            $table->text('descricao');
            $table->text('conclusao');
            $table->text('bibliografia');
            $table->text('analise_critica');
            $table->enum('supervisor_conceito',['RUIM','RAZOAVEL','BOM','OTIMO','EXCELENTE'])->nullable();
            $table->text('supervidor_comentario')->nullable();
            $table->enum('aluno_conceito',['RUIM','RAZOAVEL','BOM','OTIMO','EXCELENTE'])->nullable();
            $table->text('aluno_comentario')->nullable();
            $table->text('comissao_comentario')->nullable();
            $table->boolean('aprovado_comissao')->nullable();
            $table->boolean('relatorio_complementar')->nullable();
            $table->timestamps();

            $table->foreign('estagio_id')->references('id')->on('estagios');
            $table->foreign('comissao_estagio_id')->references('id')->on('comissao_estagios');
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
        Schema::dropIfExists('relatorio_final');
        Schema::enableForeignKeyConstraints();
    }
}
