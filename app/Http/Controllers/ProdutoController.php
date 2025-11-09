<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; // CORRIGIDO
use Illuminate\Http\Response; // CORRIGIDO
use App\Http\Controllers\Controller; // Adicione esta linha, se não estiver usando o Controller base

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $produtos = Produto::latest()->paginate(5);

        // CORRIGIDO: Adicionado o ponto e vírgula (;) no final.
        return view('produtos.index', compact('produtos'))
                             ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // CORRIGIDO: Deve ser 'produtos.create', não 'produtos.html'
        return view('produtos.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descricao' => 'required',
            'qtd' => 'required',
            // CORRIGIDO: 'requerid' -> 'required'
            'precoUnitario' => 'required', 
            // CORRIGIDO: 'requered' -> 'required'
            'precoVenda' => 'required', 
        ]);
        
        Produto::create($request->all());
        
        // CORRIGIDO: 'refresh' -> 'route' e 'sucess' -> 'success'
        return redirect()->route('produtos.index') 
                         ->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\View\View
     */
    public function show(Produto $produto): View
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\View\View
     */
    public function edit(Produto $produto): View
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            'descricao' => 'required',
            'qtd' => 'required',
            'precoVenda' => 'required',
            'precoUnitario' => 'required',
        ]);
        
        $produto->update($request->all());
        
        // CORRIGIDO: Adicionado '>' e corrigido 'sucesso'/'success'
        return redirect()->route('produtos.index') 
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();
        
        // CORRIGIDO: Adicionado '>' e corrigido 'sucesso'/'success'
        return redirect()->route('produtos.index') 
                         ->with('success', 'Produto excluído com sucesso.');
    }
}