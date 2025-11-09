@extends('produtos.template')
{{-- ATENÇÃO: Se seu layout se chama 'layout.blade.php', use: @extends('produtos.layout') --}}

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Exibir Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<br/>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descrição:</strong>
            {{ $produto->descricao }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Quantidade (QTD):</strong>
            {{ $produto->qtd }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preço de Custo (Unitário):</strong>
            {{ $produto->precoUnitario }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preço de Venda:</strong>
            {{ $produto->precoVenda }}
        </div>
    </div>
</div>

@endsection