<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriosRelatorioFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterios_relatorio_final', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relatorio_final_id');
            $table->unsignedBigInteger('criterio_id');
            $table->boolean('resposta');
            $table->timestamps();

            $table->foreign('relatorio_final_id')->references('id')->on('relatorio_final');
            $table->foreign('criterio_id')->references('id')->on('criterios');
            $table->unique(['relatorio_final_id','criterio_id']);
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
        Schema::dropIfExists('criterios_relatorio_final');
        Schema::enableForeignKeyConstraints();
    }
}
