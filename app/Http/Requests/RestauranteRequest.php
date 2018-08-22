<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestauranteRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            'endereco' => 'required|min:3',
        ];
    }
    
    public function messages(){
        return [
            'nome.required' => 'Campo nome é obrigatório',
            'descricao.required' => 'Campo descrição é obrigatório',
            'endereco.required' => 'Campo endereço é obrigatório',
            '*.min' => 'Quantidade mínima de caracteres é 3'
        ];
    }
}
