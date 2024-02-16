<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadoEncerramentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicado_encerramento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estagio_id');
            $table->text('iniciativa_rescisao');
            $table->text('motivo_rescisao');
            $table->timestamps();

            $table->foreign('estagio_id')->references('id')->on('estagios');
            $table->unique(['estagio_id']);
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
        Schema::dropIfExists('comunicado_encerramento');
        Schema::enableForeignKeyConstraints();
    }
}
