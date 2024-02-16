<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SeedTableAtividadeEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('atividade_estagios')->insert([
            'atividade' => 'Assessoria Técnico-Científica',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Assuntos Regulatórios',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Garantia da qualidade',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Pesquisa Clínica',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Pesquisa e Desenvolvimento',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Serviço de Atendimento ao Cliente - SAC',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Assistência Farmacêutica',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'=> date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Farmacovigilância',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'=> date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Marketing farmacêutico',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'=> date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Produção e Controle da Qualidade',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('atividade_estagios')->insert([
            'atividade' => 'Serviços de Análises Clínicas e Toxicológicas',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
