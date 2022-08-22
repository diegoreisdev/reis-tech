@extends('layouts.app')
@section('title', 'Home')

@section('content')

<h3 class="text-center my-3">Relatório de Serviços</h3>

<main>
    <section class="mt-2 mx-2">
        <div class="row mx-2">

            {{-- INÍCIO DA TABELA --}}
            <table class="table-striped table-hover">
                <hr class="my-3">
                {{-- NOME DO SERVIÇO --}}
                <span class="col-sm-4">Serviço: <strong>Programador</strong></span>
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
                    <tr>
                        <td>Cliente 1</td>
                        <td>(xx) 9 9999-9999</td>
                        <td class="text-center">Avenida Principal, 100</td>
                    </tr>
                </tbody>
            </table>
            {{-- FIM DA TABELA --}}
        </div>
    </section>
</main>
@endsection