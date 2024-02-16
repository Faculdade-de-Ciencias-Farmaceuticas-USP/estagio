<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtividadesEmpresas extends Model
{
    use HasFactory;
    protected $table = "atividade_estagios";

    /**
     * As empresas que constam em determinadas atividades
     */
    public function empresas() 
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(Empresa::class,'empresa_atividades','atividade_estagio_id','empresa_id');
    }
}
