<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estagio extends Model
{
    use HasFactory;

    /**
     * Documentos de estágios
     */
    public function documentos(): BelongsToMany
    {
        //return $this->belongsToMany(Role::class, 'tabela_intermediaria', 'fk', 'owner_fk');
        return $this->belongsToMany(ListaDocumentos::class,'estagios_documentos','lista_documento_id','estagio_id');
    }

    /**
     * Tipos de Estágio
     */
    public function tiposEstagio(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(TipoEstagio::class);
    }

    /**
     * Lista de Termos aditivos
     */
    public function termosAditivos(): BelongsTo
    {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(TermoAditivo::class);
    }

    /**
     * Lista de Relatórios Parciais
     */
    public function relatorioParcial(): BelongsTo
    {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(RelatorioParcial::class);
    }

    /**
     * Comunicado de Encerramento
     */
    public function comunicadoEncerramento() {
        //return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
        return $this->hasOne(ComunicadoEncerramento::class);
    }

    /**
     * Lista de Relatórios Finais
     */
    public function relatorioFinal() {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(Relatoriofinal::class);
    }
}
