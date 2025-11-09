@extends('produtos.template') 
{{-- ATENÇÃO: Se seu template for 'layout.blade.php' (como na imagem do professor), use: @extends('produtos.layout') --}}
@section('content')

<div class="row">
    <div class="col-xs-12 margin-tb">
        <br><br>
        <br><br> 

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.create') }}"> Novo Produto</a>
        </div>
    </div>
</div>

{{-- Verificação de Mensagens de Sessão (Ex: "Produto criado com sucesso!") --}}
@if (Session::get('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

{{-- Tabela de Listagem de Produtos --}}
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>QTD</th>
            <th>Custo</th>
            <th>Venda</th>
            <th width="280px">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            {{-- ATENÇÃO: O ++$i só funciona se você definir $i=0 no Controller. Usar $produto->id é mais seguro. --}}
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->descricao }}</td>
            
            <td>{{ $produto->qtd }}</td> 
            
            <td>{{ $produto->precoUnitario }}</td>
            
            <td>{{ $produto->precoVenda }}</td> 
            
            <td>
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('produtos.show', $produto->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                    
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Confirmação: Se você não está paginando, remova esta linha: --}}
{{-- {{$produtos->links()}} --}} 
{{-- Se você usa paginação, mantenha! --}}

@endsection