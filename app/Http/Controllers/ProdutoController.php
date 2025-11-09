<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; 
use App\Http\Controllers\Controller; // Mantenha esta linha se estiver no Laravel 9 ou inferior

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Paginando 5 produtos por página
        $produtos = Produto::latest()->paginate(5);

        // O with('i', ...) é para a contagem do índice na view ({{ ++$i }}).
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
        // 1. Validação dos dados (garantindo que não seja vazio)
        $request->validate([
            'descricao' => 'required',
            'qtd' => 'required|numeric|min:0', 
            'precoUnitario' => 'required|numeric|min:0', 
            'precoVenda' => 'required|numeric|min:0', 
        ]);
        
        // 2. Criação do produto no banco
        Produto::create($request->all());
        
        // 3. Redireciona com mensagem de sucesso
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
        // 1. Validação dos dados (adicionando regras 'numeric' e 'min:0' para segurança)
        $request->validate([
            'descricao' => 'required',
            'qtd' => 'required|numeric|min:0',
            'precoUnitario' => 'required|numeric|min:0',
            'precoVenda' => 'required|numeric|min:0',
        ]);
        
        // 2. Atualização do produto no banco
        $produto->update($request->all());
        
        // 3. Redireciona com mensagem de sucesso
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
        // 1. Exclusão do produto
        $produto->delete();
        
        // 2. Redireciona com mensagem de sucesso
        return redirect()->route('produtos.index') 
                             ->with('success', 'Produto excluído com sucesso.');
    }
}