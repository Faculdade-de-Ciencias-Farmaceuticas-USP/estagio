<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatorioParcialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorio_parcial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estagio_id');
            $table->unsignedBigInteger('comissao_estagio_id');
            $table->text('descricao');
            $table->date('data_inicial');
            $table->date('data_final');
            $table->text('parecer_supervisor')->nullable();
            $table->enum('conceito_supervisor',['RUIM','RAZOAVEL','BOM','OTIMO','EXCELENTE'])->nullable();
            $table->text('parecer_comissao')->nullable();
            $table->boolean('aprovado')->nullable();
            $table->timestamps();

            $table->foreign('estagio_id')->references('id')->on('estagios');
            $table->foreign('comissao_estagio_id')->references('id')->on('comissao_estagios');
            $table->unique(['estagio_id','data_inicial','data_final']);
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
        Schema::dropIfExists('relatorio_parcial');
        Schema::enableForeignKeyConstraints();
    }
}
