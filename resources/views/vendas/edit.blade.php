@extends('layouts.main')

@section('title', 'Alterar Vendas')

@section('main')

<div class="container mt-5">
    <h1 class="mb-4">Alteração de Venda</h1>
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <form id="vendas_cadastro" action="{{ route('vendas.update', ['venda' => $venda->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Cliente:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $venda->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="contato" class="form-label">Contato:</label>
            <input type="text" id="contato" name="contato" class="form-control" value="{{ old('contato', $venda->contato) }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', $venda->cpf) }}" required>
        </div>

        <div class="mb-3">
            <label for="item" class="form-label">Item Vendido:</label>
            <input type="text" id="item" name="item" class="form-control" value="{{ old('item', $venda->item) }}" required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" value="{{ old('quantidade', $venda->quantidade) }}" required>
        </div>

        <div class="mb-3">
            <label for="valor_unitario" class="form-label">Valor Total:</label>
            <input type="number" id="valor_unitario" name="valor_unitario" class="form-control" value="{{ old('valor_unitario', $venda->valor_unitario) }}" required>
        </div>

        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento:</label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
            @foreach(['Dinheiro', 'Cartão', 'Boleto', 'Parcelamento'] as $option)
                @if ($venda == $option)
                <option value="{{ $option }}" selected="selected">{{ $option }}</option>
                @else
                <option value="{{ $option }}">{{ $option }}</option>
                @endif
            @endforeach
        </select>
        </div>

        <div class="mb-3">
            <label for="quantidade_parcelas" class="form-label">Quantidade de Parcelas:</label>
            <input type="number" id="quantidade_parcelas" name="quantidade_parcelas" class="form-control" required>
        </div>

        <div id="parcelas">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Alterar Venda</button>
    
    </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const formVendas = document.querySelector('#vendas_cadastro');
            const inputParcelas = document.querySelector('#quantidade_parcelas');
            const containerParcelasTbody = document.querySelector('#parcelas tbody');

            function padTo2Digits(num) {
                return num.toString().padStart(2, '0');
            }

            function formatDate(date) {
                return [
                    padTo2Digits(date.getDate()),
                    padTo2Digits(date.getMonth() + 1),
                    date.getFullYear(),
                ].join('/');
            }

            formVendas.addEventListener('submit', function (e) {
                e.preventDefault();

                this.submit()
            })

            inputParcelas.addEventListener('change', function (e) {
                const inputQuantidade = document.querySelector('#quantidade');
                const inputValorUnitario = document.querySelector('#valor_unitario');
                const valorTotal = Number(inputQuantidade.value) * Number(inputValorUnitario.value)
                const qtdParcelas = Number(e.target.value);
                const valorParcela = valorTotal / qtdParcelas;
                const dataInicial = new Date();

                console.log(Number(inputQuantidade), Number(inputValorUnitario), valorTotal, qtdParcelas, valorParcela)
                containerParcelasTbody.innerHTML = '';
                let inputHiddenParcelas = '';

                for (let i = 0; i < qtdParcelas; i++) {
                    let parcelaData = new Date(dataInicial);
                    parcelaData.setMonth(parcelaData.getMonth() + i);
                    let dataFormatada = formatDate(parcelaData);

                    containerParcelasTbody.innerHTML += `<tr><td>${dataFormatada}</td><td>R$ ${valorParcela.toFixed(2)}</td></tr>`;
                    inputHiddenParcelas += `<input type="hidden" name="parcela[data][]" value="${dataFormatada}">`
                    inputHiddenParcelas += `<input type="hidden" name="parcela[valor_parcela][]" value="${dataFormatada}">`
                }
            });                

        });
    </script>
@endsection