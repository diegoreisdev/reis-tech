<?php

namespace App\Http\Controllers\Servico;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServicoController extends Controller
{
    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW SERVIÇO
    ****************************************************************************** */
    public function index(Request $request)
    {
        $servicos = Servico::all();
        /* Método responsável pela busca do serviço */
        $servicos = Servico::procurar($request->procurar);
        return view('servico.index', compact('servicos'));
    }

    public function create()
    {
        $title  = 'Cadastrar Serviço';
        $action = route('servicos.store');
        return view('servico.form', compact('title', 'action'));
    }

    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW DE CADASTRO DO SERVIÇO
    ****************************************************************************** */
    public function store(ServicoRequest $request)
    {
        Servico::create($request->all());
        return Redirect::route('servicos.index');
    }

    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW EDIÇÃO DO SERVIÇO
    ****************************************************************************** */
    public function edit($id)
    {
        $servico = Servico::find($id);
        $title   = 'Editar Serviço';
        $action  = route('servicos.update', $servico->id);
        return view('servico.form', compact('servico', 'title', 'action'));
    }

    /* MÉTODO RESPONSÁVEL EM ATUALIZAR O SERVIÇO
    ****************************************************************************** */
    public function update(ServicoRequest $request, $id)
    {
        $servico = Servico::find($id);
        $servico->update($request->all());
        return Redirect::route('servicos.index');
    }

    /* MÉTODO RESPONSÁVEL EM DELETAR O SERVIÇO
    ****************************************************************************** */
    public function destroy($id)
    {
        Servico::destroy($id);
        return Redirect::route('servicos.index');
    }
}
