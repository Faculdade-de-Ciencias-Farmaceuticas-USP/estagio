<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatorioParcial extends Model
{
    use HasFactory;
    protected $table = "relatorio_parcial";

    /**
     * Estágios que tem relatórios parciais
     */
    public function estagios(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(Estagio::class);
    }
}
