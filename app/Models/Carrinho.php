<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinhos';

    protected $fillable = [
        'cliente_id',
        'produto_id',
        'quantidade'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // O item do carrinho pertence a um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // O item do carrinho pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}