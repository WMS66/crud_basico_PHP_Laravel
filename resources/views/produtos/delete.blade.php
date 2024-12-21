@extends('layouts.app')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir um Produto</title>
</head>
<body>
    @POST
    <form action="{{ route('excluir_produto')['id'->$produto->id] }}" method="POST">
        @csfr
        <label for="">Tem certeza que deseja excluir este produto></label> <br />
        <input type="text" name="nome" value="{{ $produto->nome }}"> <br />
        <button>Sim</button>
    </form>
</body>
</html>
