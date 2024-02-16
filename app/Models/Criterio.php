<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;

    /**
     * Critérios preenchidos de Relatório Final
     */
    public function relatorioFinal(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(RelatorioFinal::class,'criterios_relatorio_final','relatorio_final_id','criterio_id');
    }
}
