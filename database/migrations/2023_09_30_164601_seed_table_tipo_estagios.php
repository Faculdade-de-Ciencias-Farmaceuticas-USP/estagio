<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SeedTableTipoEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tipo_estagios')->insert([
            'tipo_estagio'     => 'Estágio não obrigatório',
            'carga_horaria' => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'=> date_create('now')->format('Y/m/d')
        ]);

        DB::table('tipo_estagios')->insert([
            'tipo_estagio'  => 'Estágio em Atividades Farmacêuticas - matriz 9013',
            'carga_horaria' => 900,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('tipo_estagios')->insert([
            'tipo_estagio'  => 'Estágio em Atividades Farmacêuticas - matriz 9012',
            'carga_horaria' => 780,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('tipo_estagios')->insert([
            'tipo_estagio'  => 'Estágio em Práticas/Atenção Farmacêutica',
            'carga_horaria' => 120,
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
