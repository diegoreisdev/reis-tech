@extends('layouts.app')
@section('title', "$title")

@section('content')
<section>
    <div class="row">
        <form action="{{$action}}" method="POST" class="form col-sm-12 col-md-6 offset-md-3">
        <h3 class="text-center">{{$title}}</h3>
            @isset($servico)
                @method('PUT')
            @endisset
            @csrf
            <label for="servico">Serviço:</label>
            @error('servico')
                <small class="text-danger">{{$message}}</small><br>
            @enderror
            <input class="form-control mb-2 text-primary" type="text" name="servico" id="servico" value="{{ old('servico', $servico->servico ?? '') }}" autofocus>
                
            <label for="descricao">Descrição:</label>
            <textarea class="form-control mb-2 text-primary" name="descricao" id="descricao"  cols="30" rows="5" placeholder="Opcional...">{{ old('descricao', $servico->descricao ?? '') }}</textarea>

            <label for="valor">Valor R$:</label>
            @error('valor')
                <small class="text-danger">{{$message}}</small><br>
            @enderror
            <input class="form-control mb-2 valor text-primary" type="text" name="valor" id="valor" value="{{ old('valor', $servico->valor ?? '') }}" data-format='0,0[.]00'>
               
            <button class="btn btn-primary form-control">Cadastrar</button>
        </form>
    </div>
</section>

<script>

</script>

@endsection