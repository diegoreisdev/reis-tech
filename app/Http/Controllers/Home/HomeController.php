<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Servico;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* MÉTODO RESPONSÁVEL EM REDERIZAR A VIEW HOME
    ****************************************************************************** */
    public function index(Request $request)
    {
        $servicos = Servico::with('clientes')->get();
        /* Método responsável pela busca do serviço */
        $servicos = Servico::procurar($request->procurar);
        return view('home.index', compact('servicos'));
    }
}
