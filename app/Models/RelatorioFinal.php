<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatorioFinal extends Model
{
    use HasFactory;
    protected $table = "relatorio_final";

    /**
     * Lista de Relatorios Finais por Estágio
     */
    public function estagios(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(Estagio::class);
    }

    /**
     * Lista de Pareceristas
     */
    public function pareceristas(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(ComissaoEstagios::class,'comissao_estagio_id');
    }

    /**
     * Critérios preenchidos de Relatório Final
     */
    public function criteriosRelatorioFinal(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(Criterios::class,'criterios_relatorio_final','criterio_id','relatorio_final_id');
    }
}
