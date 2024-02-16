<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Uspdev\Replicado\Pessoa;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use \Spatie\Permission\Traits\HasRoles;
    use \Uspdev\SenhaunicaSocialite\Traits\HasSenhaunica;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obter dados da pessoa na base replicada
     * @param biginteger $idPessoa n.o. USP da pessoa a ser procurada na base replicada
     * @return Array array contendo os dados da pessoa na base replicada, com os indices abaixo
     * 
     * "codpes": "nompes": "nommaepes": "dtanas": "tipdocidf": "numdocidf": "dtaexdidf": 
     * "sglorgexdidf": "dtafimvalidf": "sexpes": "codloccer": "sglest": "codpas": "stabcocad": 
     * "timestamp": "codpescad": "dtacadpes": "codpesultalt": "dtaultalt": "nompesfon": "nommaepesfon"
     * "nomcnhpes": "numdocfmt": "stafotcad": "numcpf": "epfbcoini": "stamntnomdgt": "stautlnomsoc": 
     * "nomcnhpesfon": "nompesttd": "nompesttdfon": "stanommaedgt": "email": "ramal": 
     * 
     * As descrições de cada um dos campos estão na tabela de replicados
     */
    static function obterDadosPessoa(int $idPessoa):Array {
        $pessoa = Pessoa::dump($idPessoa);
        $pessoa['email'] = Pessoa::emailusp($idPessoa);
        $pessoa['ramal'] = Pessoa::obterRamalUsp($idPessoa);
        return $pessoa;
    }
}
