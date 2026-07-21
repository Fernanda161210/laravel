<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos preenchíveis
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefone',
        'cpf',

        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',

        'tipo',
        'ativo',
    ];

    /**
     * Campos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversão de tipos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'ativo' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // Um usuário pode possuir vários pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }

    // Um usuário pode possuir vários itens no carrinho
    public function carrinho()
    {
        return $this->hasMany(Carrinho::class, 'cliente_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Métodos auxiliares
    |--------------------------------------------------------------------------
    */

    public function isAdmin()
    {
        return $this->tipo === 'admin';
    }

    public function isCliente()
    {
        return $this->tipo === 'cliente';
    }
}