<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissaoEstagiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissao_estagios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nusp');
            $table->string('assinatura')->nullable();
            $table->enum('papel',['PRESIDENTE','MEMBRO']);
            $table->date('dtIniMandato');
            $table->date('dtFimMandato');
            $table->timestamps();
            $table->softDeletes();

            $table->unique('nusp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comissao_estagios');
    }
}
