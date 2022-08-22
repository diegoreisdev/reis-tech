<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota - {{$cliente->nome}}</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        tfoot tr td {
            text-align: end;
        }

        h1,
        h2 {
            text-align: center;
            font-size: 25px
        }

        .total {
            text-align: right;
            font-weight: bold
        }
    </style>
</head>

<body>
    <section>
        {{-- DADOS DA EMPRESA --}}
        <div>
            <h1>Reis Tech LTDA</h1>
            <p>Avenida Principal da Cidade, 100 </p>
            <p>Contato: (99) 9 9999-9999</p>
            <hr>
        </div>

        {{-- DADOS DO CLIENTE --}}
        <div>
            <h1>CLIENTE</h1>
            <h3>Nome:</h3>
            <p>{{$cliente->nome}}</p>

            <h3>Contato:</h3>
            <p>{{ $cliente->contato}}</p>
            <h3>Endereço:</h3>
            <p>{{$cliente->endereco}}</p>
            <hr>
        </div>

        {{-- DADOS DO(S) SERVIÇO(S) --}}
        <h2>DETALHES</h2>
        <table>
            <thead>
                <tr>
                    <th>Serviço(s)</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $cliente->servicos as $servico )
                <tr>
                    <td>{{$servico->servico }}</td>
                    <td>{{$servico->descricao }}</td>
                    <td>R$ {{ number_format($servico->valor,2,",",".") }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="total">TOTAL:</td>
                    <td> R$ {{ number_format($total,2,",",".") }}</td>
                </tr>
            </tfoot>
        </table>
    </section>
</body>

</html>