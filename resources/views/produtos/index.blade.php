@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Produtos</h1>

        <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Custo</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->custo }}</td>
                <td>{{ $produto->preco }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>
                    <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}"            method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th class="align left">Total Geral:</th>
                <td></td>
                <td></td>

                {{-- <th>{{ $totalCusto }}</th> --}}
                <th>R$ {{ number_format($totalPreco, 2, ',', '.') }}</th>
                <th>{{ $totalQuantidade }}</th>
                <td></td>
            </tr>
        </tfoot>

    </table>
    </div>
@endsection
