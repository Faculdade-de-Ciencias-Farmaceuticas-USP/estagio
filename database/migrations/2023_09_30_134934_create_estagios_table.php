<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstagiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('convenio_id');
            $table->unsignedBigInteger('tipo_estagio_id');
            $table->bigInteger('nusp_aluno');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('qtd_horas_semanal');
            $table->string('supervisor_nome',150);
            $table->string('supervisor_formacao',150);
            $table->string('supervisor_cargo',150);
            $table->string('supervisor_depto',150);
            $table->string('supervisor_tel',15);
            $table->string('supervisor_email',150);
            $table->float('valor_bolsa',4,2);
            $table->float('valor_transporte',4,2)->nullable();
            $table->text('beneficios');
            $table->integer('num_apolice_seguro')->nullable();
            $table->string('empresa_apolice',150);
            $table->timestamps();

            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->foreign('tipo_estagio_id')->references('id')->on('tipo_estagios');
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
        Schema::dropIfExists('estagios');
        Schema::enableForeignKeyConstraints();
    }
}
