@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')
<div class="container">
    <div class="row">
        <div id="events-container" class="col-md-12">
            @if ($notification = Session::get('success'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $notification }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <h2 class="mt-5">Lista de Vendas</h2>
            
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do cliente</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Contato</th>
                        <th scope="col">item</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Forma de pagamento</th>
                        <th scope="col">Valor total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda['id'] }}</td>
                        <td>{{ $venda['nome'] }}</td>
                        <td>{{ $venda['cpf'] }}</td>
                        <td>{{ $venda['contato'] }}</td>
                        <td>{{ $venda['item']}}</td>
                        <td>{{ $venda['quantidade'] }}</td>
                        <td>{{ $venda['valor_unitario'] }}</td>
                        <td>{{ $venda['forma_pagamento'] }}</td>
                        <td>R$ {{ number_format($venda['quantidade'] * $venda['valor_unitario'], 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('vendas.edit', ['venda' => $venda['id']]) }}" class="btn btn-primary" style="width: 90px;">Editar</a>
                            <form action="{{ route('vendas.destroy', ['venda' => $venda['id']]) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="width: 90px;">Apagar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection