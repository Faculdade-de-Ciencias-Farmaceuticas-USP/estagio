<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComissaoEstagios extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "comissao_estagios";

    /**
     * Lista de Relatórios Finais
     */
    public function relatorioFinal() {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(Relatoriofinal::class,'id','comissao_estagio_id');
    }
}
