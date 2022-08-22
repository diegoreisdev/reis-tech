@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="text-primary pt-3 mx-2">Procurar serviço</div>
    {{-- FORMULÁRIO DE PROCURA --}}
    <form action="{{ route('home.index') }}" method="GET" class="d-flex justify-content-between my-2 ">
        <input class="form-control shadow-none rounded-pill p-2 mx-1 text-light" name="procurar"
            type="text">
        <button class="btn col-sm-2 btn-primary rounded-pill">Procurar</button>
    </form>
<h3 class="text-center my-3">Relatório de Serviços</h3>

<main>
    <section class="mt-2 mx-2">
        <div class="row mx-2">
            {{-- FORELSE --}}
            @forelse ($servicos as $servico)
            {{-- INÍCIO DA TABELA --}}
                <table class="table-striped table-hover">
                    <hr class="my-3">
                    {{-- NOME DO SERVIÇO --}}
                    <span class="col-sm-4">Serviço: <strong class="text-warning">{{ $servico->servico }} </strong></span>
                    {{-- CABEÇALHO DA TABELA --}}
                    <thead class="text-primary">
                        <tr>
                            <th class="w-50">Cliente(s)</th>
                            <th class="w-25">Contato</th>
                            <th class="text-center">Endereço</th>
                        </tr>
                    </thead>
                    {{-- CORPO DA TABELA --}}
                    <tbody>
                        {{-- FOREACH --}}
                        @foreach ($servico->clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->contato}}</td>
                                <td class="text-center">{{$cliente->endereco}}</td>
                            </tr>
                        {{-- ENDFOREACH --}}
                        @endforeach

                        @empty
                            <em class="text-center text-warning">Nenhum registro encontrado</em>
                        {{-- ENDFORELSE --}}
                        @endforelse
                    </tbody>
                </table>
            {{-- FIM DA TABELA --}}
        </div>
    </section>
</main>
@endsection