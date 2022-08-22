@extends('layouts.app')
@section('title', 'Detalhes do cliente')

@section('content')

<section class="row">
    {{-- DADOS DO CLIENTE --}}
    <div class="col-md-6 my-5">
        <h3 class="text-primary">Nome:</h3>
            <p>{{$cliente->nome}}</p>
        <hr>
        <h3 class="text-primary">Contato:</h3>
            <p>{{ $cliente->contato}}</p>
        <hr>
            <h3 class="text-primary">Endereço:</h3>
        <p>{{$cliente->endereco}}</p>

    </div>
    
    {{-- DADOS DO SERVIÇO --}}
    <div class="col-md-6 my-5">
        <h3 class="text-primary">Serviço(s):</h3>
            @forelse ( $cliente->servicos as $servico )
                <span><em class="text-primary">|</em> {{$servico->servico }} </span></span>            
            @empty
                <span>Não possui serviços</span>
            @endforelse
        <hr>

        <h3 class="text-primary">Valor(es):</h3>
            @forelse ( $cliente->servicos as $servico ) 
                <span><em class="text-primary">|</em> R$ {{number_format($servico->valor,2,",",".")}} </span>
            @empty
                <span>R$ 0,00</span>
            @endforelse
        <hr>

        <h3 class="text-primary">Total:</h3>
        <span> R$ {{ number_format($total,2,",",".")}} </span>
        
    </div>
    <hr class="text-primary">

    @if ($total != 0)        
        <div class="text-end mb-3"><a class="btn btn-outline-primary text-end" href="{{route('cliente.pdf', $cliente->id)}}">Imprimir</a></div>
    @endif
</section>

@endsection