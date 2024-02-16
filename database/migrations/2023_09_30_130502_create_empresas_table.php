<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->tinyText('razao_social');
            $table->tinyText('nome_fantasia');
            $table->string('cnpj',15);
            $table->string('incr_estadual',15);
            $table->text('endereco');
            $table->string('complemento_end',100)->nullable();
            $table->string('cep',10);
            $table->text('area_atuacao');
            $table->integer('num_funcionarios');
            $table->integer('num_estagiarios');
            $table->boolean('possui_estagiario_farmacia')->default(0);
            $table->text('descricao');
            $table->text('principais_produtos');
            $table->text('servicos_atividades');
            $table->text('beneficios');
            $table->boolean('contato_outras_areas')->default(0);
            $table->boolean('possui_farmaceutico')->default(0);
            $table->text('horarios_disponiveis');
            $table->text('objetivos_educacionais');
            $table->string('representante_nome',150);
            $table->string('representante_cargo',150);
            $table->string('representante_rg',20);
            $table->string('representante_cpf',15);
            $table->string('representante_email',150);
            $table->string('representante_telefone',15);
            $table->string('representante_celular',15);
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
        Schema::dropIfExists('empresas');
    }
}
