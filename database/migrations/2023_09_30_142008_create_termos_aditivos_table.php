<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermosAditivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termos_aditivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estagio_id');
            $table->string('tipo_termo_aditivo',100);
            $table->date('data_alteracao');
            $table->timestamps();

            $table->foreign('estagio_id')->references('id')->on('estagios');
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
        Schema::dropIfExists('termos_aditivos');
        Schema::enableForeignKeyConstraints();
    }
}
