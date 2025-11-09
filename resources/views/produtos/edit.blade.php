@extends('produtos.template') 
{{-- ATENÇÃO: Se seu layout se chama 'layout.blade.php', use: @extends('produtos.layout') --}}

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<br/>

{{-- Exibe erros de validação --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Atenção!</strong> Há problemas com os dados fornecidos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- FORMULÁRIO DE EDIÇÃO --}}
{{-- O action aponta para a rota de atualização (update) passando o ID do produto --}}
<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    
    {{-- CRUCIAL: Usa o método HTTP PUT/PATCH para atualização --}}
    @method('PUT') 
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{-- Valor atual é preenchido no campo 'value' --}}
                <input type="text" name="descricao" value="{{ $produto->descricao }}" class="form-control" placeholder="Descrição" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantidade (QTD):</strong>
                <input type="number" name="qtd" value="{{ $produto->qtd }}" class="form-control" placeholder="Quantidade" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço Unitário (Custo):</strong>
                <input type="number" step="0.01" name="precoUnitario" value="{{ $produto->precoUnitario }}" class="form-control" placeholder="0.00" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço de Venda:</strong>
                <input type="number" step="0.01" name="precoVenda" value="{{ $produto->precoVenda }}" class="form-control" placeholder="0.00" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br/>
            <button type="submit" class="btn btn-success">Atualizar Produto</button>
        </div>
    </div>
</form>
@endsection