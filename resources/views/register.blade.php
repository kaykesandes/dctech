@extends('layouts.main')

@section('title', 'Registrador vedas')

@section('main')

<div class="container mt-4">
    <h2>Registrar Venda</h2>
    <form>
        <div class="mb-3">
            <label for="product" class="form-label">Produto</label>
            <input type="text" class="form-control" id="product" placeholder="Nome do Produto">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="qty" placeholder="Quantidade de produtos">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Valor</label>
            <input type="number" class="form-control" id="amount" placeholder="Valor da Venda">
        </div>
        <div class="mb-3">
            <label for="paymentMethod" class="form-label">Forma de Pagamento</label>
            <select class="form-select" id="paymentMethod" name="paymentMethod">
                <option value="credit_card">Cartão de Crédito</option>
                <option value="debit_card">Cartão de Débito</option>
                <option value="cash">Pix</option>
                <option value="transfer">Parcelamento até 12x</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

@endsection