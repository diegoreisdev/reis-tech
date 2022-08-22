<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class ClienteController extends Controller
{
    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW CLIENTE
    ****************************************************************************** */
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        /* Método responsável pela busca do cliente */
        $clientes = Cliente::procurar($request->procurar);
        return view('clientes.index', compact('clientes'));
    }

    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW CADASTRO DO CLIENTE
    ****************************************************************************** */
    public function create()
    {
        $servicos = Servico::all();
        $title    = 'Cadastrar Cliente';
        $action   = route('clientes.store');
        return view('clientes.form', compact('servicos', 'title', 'action'));
    }

    /* MÉTODO RESPONSÁVEL EM SALVAR O CLIENTE
    ****************************************************************************** */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $cliente->servicos()->sync($request->servicos);
        return Redirect::route('clientes.index')->with('cliente-store', "Cliente $request->nome criado com sucesso!");
    }

    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW DE DETALHES DO CLIENTE
    ****************************************************************************** */
    public function show($id)
    {
        $cliente = Cliente::with('servicos')->find($id);
        $total   = $cliente->servicos()->sum('valor');
        return view('clientes.show', compact('cliente', 'total'));
    }

    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW DE EDIÇÃO DO CLIENTE
    ****************************************************************************** */
    public function edit($id)
    {
        $cliente  = Cliente::with('servicos')->find($id);
        $servicos = Servico::all();
        $title    = 'Editar Cliente';
        $action   = route('clientes.update', $cliente->id);
        return view('clientes.form', compact('cliente', 'title', 'action', 'servicos'));
    }

    /* MÉTODO RESPONSÁVEL EM ATUALIZAR O CLIENTE
    ****************************************************************************** */
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        $cliente->servicos()->sync($request->servicos);
        return Redirect::route('clientes.index')->with('cliente-atualizado', "Cliente $request->nome atualizado com sucesso!");
    }

    /* MÉTODO RESPONSÁVEL EM DELETAR O CLIENTE
    ****************************************************************************** */
    public function destroy($id)
    {
        Cliente::destroy($id);
        return Redirect::route('clientes.index')->with('cliente-excluido', "Cliente excluído com sucesso!");
    }

        /* MÉTODO RESPONSÁVEL EM GERAR O PDF
    ****************************************************************************** */
    public function gerarPdf($id)
    {
        $cliente = Cliente::with('servicos')->find($id);
        $total   = $cliente->servicos()->sum('valor');

        $pdf = PDF::loadView('clientes.pdf', compact('cliente', 'total'));
        return $pdf->setPaper('A4')->stream("Nota-$cliente->nome.pdf");
    }
}
