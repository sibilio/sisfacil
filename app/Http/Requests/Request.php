<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function messages(){
    	return [
    		'required' => 'O campo :attribute é de preenchimento obrigatório.',
    		'max' => 'O campo :attribute deve possuir no máximo :max caracteres',
    		'min' => 'O campo :attribute deve possuir no mínimo :min caracteres.'
    	];
    }
}
