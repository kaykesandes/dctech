<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendasRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required'],
            'cpf' => ['required'],
            'item' => ['required'],
            'quantidade' => ['required'],
            'contato' => ['required'],
            'valor_unitario' => ['required'],
            'forma_pagamento' => ['required'],
        ];
    }
}
