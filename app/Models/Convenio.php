<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    /**
     * Consultar os dados das empresas conveniadas
     */
    public function empresas()
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(Empresa::class);
    }

    /**
     * Documentos de convênios
     */
    public function documentos()
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(ListaDocumentos::class,'convenios_documentos','lista_documento_id','convenio_id');
    }
}
