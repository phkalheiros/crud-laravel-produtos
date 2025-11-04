<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use iluuminate\View\View;
use iuminate\Http\Response;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $produtos = Produto::latest()->paginate(5);

        return View('produtos.index', compact('produtos'))
                       ->with('i',(request()->input('page',1)-1)*5)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return View ('produtos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'descrcao' => 'required',
            'qtd' => 'required',
            'precoUnitario' =>'requerid',
            'PrecoVenda' => 'requered',
        ]);
        Produto::create($request->all());
        return redirect()->refresh('produtos.index')
                        ->with('sucess', 'produto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto): View
    {
        return View('produto.show',compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto): View
    {
        return View('produtos.edit',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto):RedirectResponse
    {
        $request->validate([
            'descricao' => 'required',
            'qtd' => 'required',
            'precoVenda' => 'required',
            'precoUnitario' => 'required',
        ]);
        $produto->update($request->all());
        return redirect()->route('produtos.index')
                        -with('sucesso,produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();
        return redirect()->route('produtos.index')
                        -with('sucesso','Produto excluido com sucesso');
    }
}
