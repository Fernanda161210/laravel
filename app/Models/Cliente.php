<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'senha',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'ativo'
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // Um cliente pode ter vários pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    // Um cliente pode ter vários itens no carrinho
    public function carrinho()
    {
        return $this->hasMany(Carrinho::class);
    }
}