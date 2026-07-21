<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id',
        'numero_pedido',
        'valor_total',
        'status',
        'observacoes'
    ];

    protected $casts = [
        'valor_total' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // Um pedido pertence a um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Um pedido possui vários itens
    public function itens()
    {
        return $this->hasMany(ItemPedido::class);
    }
}