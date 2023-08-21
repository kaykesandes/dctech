<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar venda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mt-5">
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
    <form id="vendas_cadastro" action="{{ route('vendas.store') }}" method="post">
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
            <label for="valor_unitario" class="form-label">Valor Total:</label>
            <input type="number" id="valor_unitario" name="valor_unitario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento:</label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão">Cartão</option>
                <option value="Boleto">Boleto</option>
                <option value="Parcelamento">Parcelamento</option>
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
        <div class="mb-3">
        <button type="submit" class="btn btn-primary active">Cadastrar Venda</button>
        </div>
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
            </div>
        </div>
    </div>
</x-app-layout>
