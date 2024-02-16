<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaContato extends Model
{
    use HasFactory;
    protected $table = "empresa_contatos";

    /**
     * Consultar os dados dos contatos da empresa
     */
    public function empresas(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(Empresa::class);
    }
}
