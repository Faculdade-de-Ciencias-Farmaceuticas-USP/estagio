<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * Pegar os convênios que pertencem à Empresa
     */
    public function convenios()
    {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(Convenio::class);
    }

    /**
     * Pegar os contatos que pertencem à Empresa
     */
    public function contatos()
    {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(EmpresaContatos::class);
    }

    /**
     * As áreas de atenção que pertencem à empresa
     */
    public function areasAtencaoFarmaceutica()
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(AreaAtencaoFarmaceutica::class,'empresa_area_farmaceutica','area_atencao_farmaceutica_id','empresa_id');
    }

    /**
     * As atividades de estágios que a empresa oferece
     */
    public function atividadesEstagios() 
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(AtividadesEmpresa::class,'empresa_atividades','atividade_estagio_id','empresa_id');
    }
}
