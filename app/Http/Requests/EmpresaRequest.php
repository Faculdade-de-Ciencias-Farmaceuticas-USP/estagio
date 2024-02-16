<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  [ 'razao_social'        =>'required|min:3|max:255'
                ,'nome_fantasia'        =>'required|min:3|max:255'
                ,'cnpj'                 =>['required',new validaCNPJ]
                ,'inscr_estadual'       =>'required|min:3'
                ,'endereco'             =>'required|max:100'
                ,'cep'                  =>'required|max:10'
                ,'bairro'               =>'required|max:50'
                ,'cidade'               =>'required|max:100'
                ,'area_atuacao'         =>'required|min:5'
                ,'num_funcionarios'     =>'required|numeric'
                ,'num_estagiarios'      =>'required|numeric'
                ,'descricao_local'      =>'required|min:5'
                ,'principais_produtos'  =>'required|min:5'
                ,'servicos'             =>'required|min:5'
                ,'estagiarioF'          =>'required'
                ,'contato_aluno'        =>'required'
                ,'possui_orientador'    =>'required'
                ,'objetivos'            =>'required|min:3'
                ,'nome_representante'   =>'required|min:3|max:150'
                ,'cargo_representante'  =>'required|min:3|max:150'
                ,'rg_representante'     =>'required|max:20'
                ,'email_representante'  =>'required|email'
                ,'tel_representante'    =>'required'
                ,'cel_representante'    =>'required'
                ,'orgao_publico'        =>'required'
            ];

        
    }

    public function message() {
        return [ 'required'                     => "O campo :attribute deve ser informado"
                ,'min'                          => "O campo :attribute deve conter no mínimo :min caracteres"
                ,'max'                          => "O campo :attribute deve conter no mínimo :max caracteres"
                ,'email'                        => "E-mail inválido"
                ,'file'                         => "Arquivo inválido"
                ,'mimes'                        => "O arquivo deve estar em formato PDF"
                ,'estagiarioF.required'         => 'Responda a questão: a empresa possui estagiários...?'
                ,'contato_aluno.required'       => 'Responda a questão: o aluno terá contato com profissionais...?'
                ,'possui_orientador.required'   => 'Responda a questão: a empresa possui profissionais da farmácia...?'
                ];
    }
}
