<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Authenticatable
{
    use SoftDeletes;

    public $table = 'colaborador';
    public $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'cpf', 'rg', 'nascimento', 'cep', 'endereco', 'numero', 'cidade', 'estado', 'telefone', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function quaisSalarios()
    {
        return $this->HasMany('App\Models\Salario', 'colaborador_id', 'id')->orderby('id', 'desc')->withTrashed();
    }
}
