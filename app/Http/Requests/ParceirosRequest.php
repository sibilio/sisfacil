<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParceirosRequest extends Request
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
            //'cnpj' => 'required|min:14|max:18',
            'nome' => 'required|max:100',
            'endereco' => 'required|max:150',
            'bairro' => 'required|max:30',
            'cidade' => 'required|max:30',
            'uf' => 'required|min:2|max:2'
        ];
    }
}
