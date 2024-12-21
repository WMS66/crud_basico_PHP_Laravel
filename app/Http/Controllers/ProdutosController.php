<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutosController extends Controller
{
    // Método index
    public function index()
    {
        // die('Método index chamado');
        $produtos = Produto::all();
        // dd($produtos);
        if ($produtos->isEmpty()) {
            return view('produtos.index', ['mensagem' => 'Não há produtos cadastrados.']);
        }

            // Calcula o valor total de cada produto (preço * quantidade)
            foreach ($produtos as $produto) {
                $produto->total_value = $produto->preco * $produto->quantidade;
            }

            // Calcula o total geral dos custo preços e quantidades
            // $totalCusto = $produtos->sum(function ($produto) {
            //     return $produto->custo * $produto->quantidade;
            // });

            $totalPreco = $produtos->sum(function ($produto) {
                return $produto->preco * $produto->quantidade;
            });

            $totalQuantidade = $produtos->sum('quantidade');

        // dump($produtos); // Para depuração:
         return view('produtos.index', compact('produtos','totalPreco', 'totalQuantidade'));
    }

       // Método reate
       public function create()
       {
           return view('produtos.create');
       }

    // Método store
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'quantidade' => 'required|numeric',
        ]);

        Produto::create($request->all());

        // return "Produto criado com sucesso!";
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }
    // Método Show
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit',  compact('produto'));
    }

    // Método update
    public function update(Request $request, Produto $produto)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'quantidade' => 'required|numeric',
        ]);

        $produto->update($validatedData);
       return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Método delete
    public function destroy(Produto $produto)
    {
        $produto->delete();
         return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');

    }
}
