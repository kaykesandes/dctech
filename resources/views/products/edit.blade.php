@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')

<div class="container mt-5">
    <h1 class="mb-4">Edição de registro</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
        @csrf
        @method('PUT')
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
                <option value="0">Dinheiro</option>
                <option value="1">Cartão</option>
                <option value="2">Boleto</option>
                <option value="3">Parcelamento</option>
            </select>
        </div>
        <a href="{{ route('products.edit', ['product' => $product->id]) }}"><button type="submit" class="btn btn-primary">Alterar registro</button></a>
    </form>
        <br>
        <a href="{{ route('products.index') }}"><button type="submit" class="btn btn-primary">Voltar</button></a>
    </div>

@endsection