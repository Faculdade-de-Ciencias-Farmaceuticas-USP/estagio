<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaAtencaoFarmaceutica extends Model
{
    use HasFactory;
    protected $table = "area_atencao_farmaceuticas";

    /**
     * Empresas que tem as área cadastradas
     */
    public function areasAtencaoFarmaceutica()
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(Empresa::class,'empresa_area_farmaceutica','area_atencao_farmaceutica_id','empresa_id');
    }
}
