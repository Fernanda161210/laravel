<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $table = 'promocoes';

    protected $fillable = [
        'titulo',
        'descricao',
        'desconto',
        'tipo_desconto',
        'data_inicio',
        'data_fim',
        'ativo'
    ];

    protected $casts = [
        'desconto' => 'decimal:2',
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'ativo' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    // Uma promoção pode possuir vários produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}