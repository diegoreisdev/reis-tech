<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'     => 'required|min: 4|max: 32',
            'contato'  => 'required|min: 16',
            'endereco' => 'required|min: 5'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'     => 'Por favor, preencha o nome',
            'nome.min'          => 'Nome precisa ter no mínimo 4 letras',
            'nome.max'          => 'Máximo permitido 32 caracteres',
            'contato.required'  => 'Por favor, adicionar um contato',
            'contato.min'       => 'Contato não preenchido corretamente',
            'endereco.required' => 'Por favor, adicionar o endereço',
            'endereco.min'      => 'Endereço precisa de no mínimo 5 caracteres'
        ];
    }
}
