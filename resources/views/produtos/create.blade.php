@extends('layouts.app')

@section('content')
    <title>Cadastrar um novo Produto</title>

    <form action="{{ route('registrar_produto') }}" method="POST">
        @csrf
        <label for="">Nome </label><br/>
        <input type="text" name="nome"> <br/>
        <label for="">Custo </label><br/>
        <input type="text" name="custo"><br/>
        <label for="">Preco </label><br/>
        <input type="text" name="preco"><br/>
        <label for="">Quantidade </label><br/>
        <input type="text" name="quantidade"><br/>
        <button type="submit">Salvar</button>
    </form>
@endsection
