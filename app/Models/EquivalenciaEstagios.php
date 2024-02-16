<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquivalenciaEstagios extends Model
{
    use HasFactory;
    protected $table="equivalencia_estagios";

    /**
     * Documentos de convênios
     */
    public function documentos(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(ListaDocumentos::class,'equivalencia_documentos','equivalencia_estagio_id','lista_documento_id');
    }
}
