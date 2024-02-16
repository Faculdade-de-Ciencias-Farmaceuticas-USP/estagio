<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstagio extends Model
{
    use HasFactory;
    protected $table = "tipo_estagios";

    /**
     * Estágios que pertencem a um tipo
     */
    public function estagios(): BelongsTo
    {
        //return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(Estagio::class);
    }
}
