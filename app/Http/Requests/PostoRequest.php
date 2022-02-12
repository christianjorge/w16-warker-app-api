<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * O método rules faz a validação dos campos do formulário, o messages configura a mensagem que será exibida,
     * caso nenhuma mensagem seja configurada será exibida a padrão do Laravel (Em inglês, precisar traduzir a linguagem)
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cidades_id'=>'required',
            'reservatorio'=>'required|numeric',
            'latitude'=>'required',
            'longitude'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'reservatorio.required' => 'Defina a capacidade atual do reservatório!',
            'reservatorio.numeric'  => 'Capacidade é numérica, preste atenção.',
            'latitude.required'  => 'Defina a latitude conforme padrão do maps',
            'longitude.required'  => 'Defina a longitude conforme padrão do maps',
        ];
    }
}
