@extends('layouts.app')
@section('title', 'Serviços')

@section('content')
<section class="row">

    {{-- TABELA DE SERVIÇOS --}}
    <h3 class="text-center my-3">Serviços Cadastrados</h3>
    <table class="table text-light">
        <thead class="text-primary">
            <th>Serviço</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th class="text-center">Ações</th>
        </thead>
        <tbody>
            @forelse ($servicos as $servico)
                <tr>
                    <td>{{$servico->servico}}</td>
                    <td>{{$servico->descricao}}</td>
                    <td>R$ {{number_format($servico->valor,2,",",".")}}</td>
                    <td class="text-center w-25">
                        {{-- BOTÃO DE EDITAR --}}
                        <a class="btn btn-outline-secondary btn-sm p-1 my-1 text-light" href="{{route('servicos.edit', $servico->id)}}">Editar</a>
                        {{-- FORMULÁRIO DE EXCLUSÃO --}}
                        <form class="form-del" action="{{route('servicos.destroy', $servico->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger btn-sm p-1 my-1 btn-del"
                            onclick='return confirm("Tem certeza que deseja excluir {{$servico->servico}}?")'>Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="text-center text-warning"><td colspan="4"><em>Nenhum serviço encontrado</em></td></tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection