@extends('layouts.app')
@section('title', $title)

@section('content')
<section class="row">
    <div>
        <h3 class="text-center">{{$title}}</h3>
        <form action="{{$action}}" method="POST" class="form col-sm-12 col-md-6 offset-md-3">
            @isset($cliente)
                @method('PUT')
            @endisset
            @csrf
            {{-- NOME DO CLIENTE --}}
            <label for="nome">Nome:</label>
                @error('nome')
                    <small class="text-danger">{{$message}}</small><br>
                @enderror
            <input class="form-control mb-2 text-primary" type="text" name="nome" id="nome" value="{{ old('nome', $cliente->nome ?? '') }}"  autofocus>

             {{-- CONTATO DO CLIENTE --}}
            <label for="contato">Contato:</label>
                @error('contato')
                    <small class="text-danger">{{$message}}</small><br>
                @enderror
            <input class="form-control mb-2 contato text-primary" type="tel" name="contato" id="contato" value="{{ old('contato', $cliente->contato ?? '') }}" placeholder="(00) 0 0000-0000">

            {{-- ENDEREÇO DO CLIENTE --}}
            <label for="endereco">Endereço:</label>
                @error('endereco')
                    <small class="text-danger">{{$message}}</small><br>
                @enderror
            <input class="form-control mb-2 text-primary" type="text" name="endereco" id="endereco" value="{{ old('endereco', $cliente->endereco ?? '') }}" placeholder="Ex.: Av. Principal, 100">
            
            {{-- SERVIÇOS PARA O CLIENTE --}}
            <label class="form-label">Serviços:</label>
            <select name="servicos[]" class="form-control selectpicker mb-2" multiple>
                <option selected disabled>Selecione</option>
                @foreach ($servicos as $servico)
                    <option class="linkhover" value="{{$servico->id}}"
                        @if (old('servicos'))
                            {{ $servico->id, old('servicos') ? 'selected' : ''}}                       
                        @else
                            @isset($cliente)
                                {{$cliente->servicos->contains($servico->id) ? 'selected' : '' }}
                            @endisset
                        @endif
                    >{{$servico->servico}} - R$ {{number_format($servico->valor,2,",",".")}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary form-control">Cadastrar</button>
        </form>
    </div>
</section>
@endsection