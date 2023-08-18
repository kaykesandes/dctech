@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')

<div class="container mt-5">
    <h1 class="mb-4">Cadastro de Venda</h1>
    <form action="{{ route('processar_venda') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Cliente:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contato" class="form-label">Contato:</label>
            <input type="text" id="contato" name="contato" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control cpf-mask">
        </div>

        <div class="mb-3">
            <label for="item" class="form-label">Item Vendido:</label>
            <input type="text" id="item" name="item" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valorTotal" class="form-label">Valor Total:</label>
            <input type="number" id="valorTotal" name="valorTotal" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="formaPagamento" class="form-label">Forma de Pagamento:</label>
            <select id="formaPagamento" name="formaPagamento" class="form-select" required>
                <option value="dinheiro">Dinheiro</option>
                <option value="cartao">Cartão</option>
                <option value="boleto">Boleto</option>
                <option value="transferencia">Parcelamento</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Venda</button>
        <button></button>
    </form>
    </div>

@endsection