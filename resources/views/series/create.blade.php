@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
    <form action="" method="POST">
    @csrf    
    <div class="form-group">
            <label for="nome" class="label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <button class="btn btn-primary">
            Adicionar
        </button>
    </form>
@endsection