<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermoAditivo extends Model
{
    use HasFactory;
    protected $table = "termos_aditivos";

    /**
     * Estágios que têm termos aditivos
     */
    public function estagios(): HasMany
    {
        //return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(Estagio::class);
    }
}
