<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SeedTableAreaAtencaoFarmaceuticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('area_atencao_farmaceuticas')->insert([
            'area' => 'Drogaria',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('area_atencao_farmaceuticas')->insert([
            'area' => 'Farmácia Hospitalar/Clínica',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('area_atencao_farmaceuticas')->insert([
            'area' => 'Farmácia de Manipulação',
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
