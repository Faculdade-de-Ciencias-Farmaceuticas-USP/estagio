<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ListaDocumentosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && (auth()->user()->can('comissao') || auth()->user()->can('admin')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipoDocumento'         => 'required'
           ,'documento'             => 'required'
           ,'descricao_documento'   => 'required'
           ,'periodicidade'         => 'required'
           ,'recorrencia'           => 'required_if:periodicidade,PERIODICO'
           ,'prazo'                 => 'required_if:periodicidade,PERIODICO'
        ];
    }

    public function messages() {
        return [
            'required'    => 'O campo :attribute deve ser informado'
           ,'required_if' => 'O campo :attribute é obrigatório se a periocidade for PERIODICO.'
        ];
    }
}
