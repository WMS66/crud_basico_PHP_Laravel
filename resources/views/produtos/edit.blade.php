@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Nome </label><br/>
            <input type="text" name="nome" value="{{ $produto->nome }}">
        </div>

        <div class="mb-3">
        <label for="">Custo </label><br/>
        <input type="text" name="custo" value="{{ $produto->custo }}">
        </div>

        <div class="mb-3">
        <label for="">Preco </label><br/>
        <input type="text" name="preco" value="{{ $produto->preco }}">
        </div>

        <div class="mb-3">
        <label for="">Quantidade </label><br/>
        <input type="text" name="quantidade" value="{{ $produto->quantidade }}">
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
