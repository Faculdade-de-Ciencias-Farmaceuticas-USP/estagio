<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDocumentos extends Model
{
    use HasFactory;
    protected $table="lista_documentos";

    /**
     * Documentos de convênios
     */
    public function docConvenios(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(Convenio::class,'convenios_documentos','convenio_id','lista_documento_id');
    }

    /**
     * Documentos de estágios equivalentes
     */
    public function docEquivalencia(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(EquivalenciaEstagios::class,'equivalencia_documentos','lista_documento_id','equivalencia_estagio_id');
    }

    /**
     * Documentos de estágios
     */
    public function docEstagios(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(Estagio::class,'estagios_documentos','estagio_id','lista_documento_id');
    }
}
