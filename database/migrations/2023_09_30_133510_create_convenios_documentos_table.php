<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('convenio_id');
            $table->unsignedBigInteger('lista_documento_id');
            $table->date('data_documento')->nullable();
            $table->boolean('conferido')->default(0);
            $table->bigInteger('nusp_conferente')->nullable();
            $table->string('path_arquivo_pdf')->nullable();
            $table->timestamps();

            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->foreign('lista_documento_id')->references('id')->on('lista_documentos');
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
        Schema::dropIfExists('convenios_documentos');
        Schema::enableForeignKeyConstraints();
    }
}
