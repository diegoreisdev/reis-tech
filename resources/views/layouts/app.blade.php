<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/reis-tech.png')}}" type="image/x-icon">
    <title>@yield('title') - Reis Tech</title>
    {{-- STYLE --}}
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
    {{-- AJAX --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset("css/form.css")}}">
</head>

<body>    
    <header>
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
            <img class="navbar-brand" src="{{asset('img/reis-tech.png')}}" alt="Reis Tech">
                <button class="navbar-toggler bg-primary p-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-controls="collapseMenu" aria-expanded="false"
                    aria-label="Toggle navigation">Menu
                </button>
                <div class="collapse navbar-collapse" id="collapseMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link text-primary" aria-current="page" href="{{ route('home.index') }}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link dropdown-item text-light linkhover" href="{{ route('clientes.create') }}">Cadastrar Cliente</a></li>
                                <li class="nav-item"><a class="nav-link dropdown-item text-light linkhover" href="{{ route('clientes.index') }}">Listar Clientes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Serviços
                            </a>
                            <ul class="dropdown-menu ulhover">
                                <li class="nav-item"><a class="nav-link dropdown-item text-light linkhover" href="{{ route('servicos.create') }}">Cadastrar Serviço</a></li>
                                <li class="nav-item"><a class="nav-link dropdown-item text-light linkhover" href="{{ route('servicos.index') }}">Listar Serviços</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">

        @yield('content')

    </div>
    
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/mask.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>