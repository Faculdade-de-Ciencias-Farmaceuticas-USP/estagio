<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->date('dt_inicio');
            $table->date('dt_fim');
            $table->boolean('aprovado')->default(0);
            $table->string('path_contrato_convenio',100);
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->unique(['empresa_id','dt_inicio','dt_fim']);
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
        Schema::dropIfExists('convenios');
        Schema::enableForeignKeyConstraints();
    }
}
