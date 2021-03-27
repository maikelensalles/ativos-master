<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            'image' => ['required'],
            'image_body' => ['required'],
            'image_body2' => ['required'],
            'forma_pagamento' => ['required'],
            'titulo' => ['required'],
            'sub_titulo' => ['required'],
            'rentabilidade_alvo' => ['required'],
            'valor_cota' => ['required'],
            'participacao' => ['required'],
            'descricao' => [],
            'body' => [],
            'status' => ['required'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
        ];
    }
}