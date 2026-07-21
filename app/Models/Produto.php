<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'categoria_id',
        'subcategoria_id',

        'nome',
        'marca',
        'descricao',

        'preco',
        'preco_promocional',

        'estoque',
        'sku',
        'codigo_barras',

        'peso',
        'unidade',

        'imagem',

        'destaque',
        'promocao',
        'ativo'
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'preco_promocional' => 'decimal:2',
        'peso' => 'decimal:3',

        'destaque' => 'boolean',
        'promocao' => 'boolean',
        'ativo' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // Produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Produto pertence a uma subcategoria
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    // Produto pode estar em vários itens de pedidos
    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class);
    }

    // Produto pode estar em vários carrinhos
    public function carrinhos()
    {
        return $this->hasMany(Carrinho::class);
    }
}