@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')
<div class="container mt-5">
    <h1>Portal de Pagamento</h1>

    <!-- Formulário para inserir a quantidade de parcelas -->
    <form action="{{ route('register.pagament') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="quantidadeParcelas" class="form-label">Quantidade de Parcelas:</label>
            <input type="number" id="quantidadeParcelas" name="quantidadeParcelas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Gerar Parcelas</button>
    </form>

    <!-- Lógica de geração e exibição de parcelas -->
    @if (isset($parcelas) && count($parcelas) > 0)
    <h2 class="mt-4">Parcelas Geradas:</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop para listar as parcelas -->
            @foreach ($parcelas as $parcela)
            <tr>
                <td>{{ $parcela['data'] }}</td>
                <td>{{ $parcela['valor'] }}</td>
                <td>{{ $parcela['observacao'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
