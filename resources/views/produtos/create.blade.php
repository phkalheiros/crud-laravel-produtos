@extends('produtos.template')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Novo Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<br/>

{{-- CRUCIAL: Exibe erros de validação --}}
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

{{-- O formulário será enviado para o método 'store' do recurso 'produtos' --}}
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <input type="text" name="descricao" class="form-control" placeholder="Descrição" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantidade (QTD):</strong>
                <input type="number" min="0" max="99999" step="1" format="currency" name="qtd" class="form-control" placeholder="Quantidade" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço Unitário (Custo):</strong>
                <input type="number" step="0.01" name="precoUnitario" class="form-control" placeholder="0.00" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço de Venda:</strong>
                <input type="number" step="0.01" name="precoVenda" class="form-control" placeholder="0.00" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br/>
            <button type="submit" class="btn btn-success">Cadastrar Produto</button>
        </div>
    </div>
</form>
@endsection