@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
<section class="row">
    {{-- MENSSAGENS DE RETORNO --}}
    @include('messages.msgs')

    <div class="text-primary pt-3 mx-2">Procurar cliente</div>
    {{-- FORMULÁRIO DE PROCURA --}}
    <form action="{{ route('clientes.index') }}" method="GET" class="d-flex justify-content-between my-2 ">
        <input class="form-control shadow-none rounded-pill p-2 mx-1 text-light" name="procurar" type="text">
        <button class="btn col-sm-2 btn-primary rounded-pill">Procurar</button>
    </form>
    
    {{-- TABELA DE CLIENTES --}}
    <h3 class="text-center my-3">Clientes Cadastrados</h3>
    <table class="table text-light">
        <thead class="text-primary">
            <th>Cliente</th>
            <th>Contato</th>
            <th>Endereço</th>
            <th class="text-center">Ações</th>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente )
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->contato}}</td>
                <td>{{$cliente->endereco}}</td>
                <td class="text-center w-25">
                    {{-- BOTÃO DE DETALHES --}}
                    <a class="btn btn-outline-success btn-sm p-1 my-1" href="{{route('clientes.show', $cliente->id)}}">Detalhes</a>
                    {{-- BOTÃO DE EDITAR --}}
                    <a class="btn btn-outline-secondary btn-sm p-1 my-1 text-light" href="{{route('clientes.edit', $cliente->id)}}">Editar</a>
                    {{-- FORMULÁRIO DE EXCLUSÃO --}}
                    <form class="form-del" action="{{route('clientes.destroy', $cliente->id)}}" method="POST">
                        @method("DELETE")
                        @csrf                        
                        <button class="btn btn-outline-danger btn-sm p-1 my-1 btn-del"
                        onclick='return confirm("Tem certeza que deseja excluir {{$cliente->nome}}?")'>Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="text-center text-warning">
                <td colspan="4"><em>Nenhum cliente encontrado</em></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection