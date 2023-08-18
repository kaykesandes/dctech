@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')

<div id="search-container" class="col-md-5">
    <h1>Busque uma venda</h1>
    <form action="">
        <input type="text" id="search" class="form-control" placeholder="Procurar">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <h2>Resultado da busca</h2>
    <div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                <th scope="col">Forma de pagamento</th>
                <th scope="col">Valor total</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['qty'] }}</td>
                <td>{{ $product['valor'] }}</td>
                <td>{{ $product['fp'] }}</td>
                <td>{{ $product['qty'] * $product['valor'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="container mt-4">
            <a href="{{ route('products.edit', ['product' => $product['id']]) }}" class="btn btn-primary" style="width: 90px;">Editar</a>
            <a href="{{ route('products.destroy', ['product' => $product['id']]) }}" class="btn btn-danger"  style="width: 90px;">Apagar</a>
        </div>
    
    </div>
</div>

<div class="container mt-4">

</div>

@endsection