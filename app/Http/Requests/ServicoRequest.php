<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'servico' => 'required|min: 5',
            'valor'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'servico.required' => 'Por favor, preencha o nome do serviço',
            'servico.min'      => 'O campo serviço deve ter pelo menos 5 caracteres',
            'valor.required'   => 'Por favor, preencha o valor',
            'valor.numeric'    => 'O valor precisa ser numérico',
        ];
    }
}
