@extends('layouts.main')

@section('title', 'Dashboard')

@section('main')

<div id="events-container" class="col-md-12">
    <h2 class="mt-5">Resultado da busca</h2>
    <div class="container mt-5">
    <table class="table">
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
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['cpf'] }}</td>
                    <td>{{ $product['contato'] }}</td>
                    <td>{{ $product['item']}}</td>
                    <td>{{ $product['qty'] }}</td>
                    <td>{{ $product['valor'] }}</td>
                    <td>{{ $product['fp'] }}</td>
                    <td>{{ $product['qty'] * $product['valor'] }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['product' => $product['id']]) }}" class="btn btn-primary" style="width: 90px;">Editar</a>
                        <form action="{{ route('products.destroy', ['product' => $product['id']]) }}" method="post" style="display: inline;">
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

<div class="container mt-4">

</div>
@endsection