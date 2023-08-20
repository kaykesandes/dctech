<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    const PAGAMENTO_DINHEIRO = 'Dinheiro';
    const PAGAMENTO_CARTAO = 'Cartão';
    const PAGAMENTO_BOLETO = 'Boleto';
    const PAGAMENTO_PARCELAMENTO = 'Parcelamento';

    const FORMAS_PAGAMENTOS = [
        self::PAGAMENTO_DINHEIRO,
        self::PAGAMENTO_CARTAO,
        self::PAGAMENTO_BOLETO,
        self::PAGAMENTO_PARCELAMENTO,
    ];

    protected $fillable = [
        'nome',
        'cpf',
        'contato',
        'item',
        'quantidade',
        'valor_unitario',
        'forma_pagamento',
    ];
}
