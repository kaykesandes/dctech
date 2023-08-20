<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Http\Requests\VendasRequest;

class VendasController extends Controller
{
    public function index()
    {   
        $vendas = Venda::all();
        return view('vendas.index', compact('vendas')); 
    }
    
    public function create()
    {
        return view('vendas.create');
    }

    public function edit(Venda $venda)
    {
        return view('vendas.edit', compact('venda'));
    }

    public function show($id)
    {
        return true;
    }

    public function store(VendasRequest $request)
    {
        $venda = Venda::create($request->validated());
    
        return redirect()
                ->route('vendas.index')
                ->with('success', 'Venda cadastrada com sucesso');
    }

    public function update(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);

        $venda->nome = $request->input('nome');
        $venda->cpf = $request->input('cpf');
        $venda->item = $request->input('item');
        $venda->contato = $request->input('contato');
        $venda->quantidade = $request->input('quantidade');
        $venda->valor_unitario = $request->input('valor_unitario');
        $venda->forma_pagamento = $request->input('forma_pagamento');
    
        $venda->save();
    
        return redirect()
                ->route('vendas.index')
                ->with('success', 'Venda atualizada com sucesso');
    }

    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();

        return redirect()
                ->route('vendas.index')
                ->with('success', 'Venda excluída com sucesso');
    }
}