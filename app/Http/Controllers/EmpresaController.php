<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;

use App\Models\Empresa;
use App\Models\EmpresaContato;
use App\Models\ListaDocumentos;
use App\Models\AtividadesEmpresas;
use App\Models\AreaAtencaoFarmaceutica;
use App\Models\Convenio;
use App\Models\ConvenioDocumento;
use Uspdev\Replicado\Pessoa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Rules\validaCNPJ;
use App\Rules\validaCPF;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_documentos = ListaDocumentos::where('tipo','EMPRESA')
                                           ->where('periodicidade','INICIAL')
                                           ->get();

        $area_atuacao = AtividadesEmpresas::orderBy('atividade')->get();

        $areaAtencao = AreaAtencaoFarmaceutica::orderBy('area')->get();

        $userName = Auth::user()->name;
                $pessoa = Pessoa::procurarPorNome($userName);
                $emailPessoa = Pessoa::email($pessoa[0]['codpes']);

        if ($emailPessoa == Auth::user()->email) {
            dd($pessoa);
        }

        

        return view('empresa.cadastro',['documentos'    => $lista_documentos
                                      , 'area_atuacao'  => $area_atuacao
                                      , 'areaAtencao'   => $areaAtencao]
                   );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EmpresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $request->validate();

        $cnpj = preg_replace("/[^0-9]/", "", $request->input('cnpj'));
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        if (Empresa::where('cnpj',$cnpj)->cont() > 0) {
            return Redirect::back()
                            ->withErrors(['cnpj' => 'Empresa já cadastrada, logue no sistema para ver os seus dados.'])
                            ->withInput();
        }

        $listaDocumentos = array();
        $listaArquivos = array();
        $empresa = new Empresa();

        if (!is_array($request->input('atividades_estagio')) || count($request->input('atividades_estagio')) == 0) {
            return Redirect::back()
                            ->withErrors(['atividade_estagio' => 'As atividades que o aluno poderá exercer devem ser informadas'])
                            ->withInput();
        } 
        
        if (!is_array($request->input('area_atencao')) || count($request->input('area_atencao')) == 0) {
            return Redirect::back()
                            ->withErrors(['area_atencao' => 'As áreas que o aluno pode atuar devem ser informadas'])
                            ->withInput();
        }

        if (!is_array($request->input('beneficio')) || count($request->input('beneficio')) == 0) {
            return Redirect::back()
                            ->withErrors(['beneficio' => 'Os benefícios devem ser informados'])
                            ->withInput();
        }

        if (!$request->filled('segunda') && !$request->filled('terca') &&
            !$request->filled('quarta') && !$request->filled('quinta') &&
            !$request->filled('sexta') && !$request->filled('sabado') &&
            !$request->filled('domingo')) 
        {
            return Redirect::back()
                            ->withErrors(['msg' => 'Não foi informado nenhum dia para realização do estágio'])
                            ->withInput();
        }

        if (($request->filled('segunda') || $request->filled('terca') ||
            $request->filled('quarta') || $request->filled('quinta') ||
            $request->filled('sexta')) && !$request->filled('horario_dia_util')) 
        {
            return Redirect::back()
                            ->withErrors(['horario_dia_util' => 'Não foi informado nenhum horário para realização do estágio em dia útil'])
                            ->withInput();
        }

        if (($request->filled('sabado') || $request->filled('domingo')) && 
            !$request->filled('horario_fds')) 
        {
            return Redirect::back()
                            ->withErrors(['horario_fds' => 'Não foi informado nenhum horário para realização do estágio no final de semana'])
                            ->withInput();
        }

        if (!is_array($request->input('nome_contato')) || count($request->input('nome_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['nome_contato' => 'Devem ser informados ao menos 2 nomes de contatos'])
                            ->withInput();
        }

        if (!is_array($request->input('cargo_contato')) || count($request->input('cargo_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['cargo_contato' => 'Devem ser informados ao menos 2 cargos de contatos'])
                            ->withInput();
        }

        if (!is_array($request->input('rg_contato')) || count($request->input('rg_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['rg_contato' => 'Devem ser informados ao menos 2 RGs de contatos'])
                            ->withInput();
        }

        if (!is_array($request->input('cpf_contato')) || count($request->input('cpf_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['cpf_contato' => 'Devem ser informados ao menos 2 CPFs de contatos'])
                            ->withInput();
        } else {
            foreach($request->input('cpf_contato') as $key => $cpf) {
                $validacao = new validaCPF();
                $ind = $key + 1;
                if (!$validacao->passes('cpf_contato',$cpf)) {
                    return Redirect::back()
                            ->withErrors(['cpf_contato' => 'CPF do '.$ind.'º contato é inválido'])
                            ->withInput();
                }
                if ($key > 0) {
                    if ($request->input('cpf_contato')[$key-1] == $cpf) {
                        return Redirect::back()
                            ->withErrors(['cpf_contato' => 'Os contatos precisam ter CPFs diferentes.'])
                            ->withInput();
                    }
                }
            }
        }

        if (!is_array($request->input('email_contato')) || count($request->input('email_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['email_contato' => 'Devem ser informados ao menos 2 emails de contatos'])
                            ->withInput();
        } else {
            //$expressao = "[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$";
            foreach($request->input('email_contato') as $key => $email) {
                $ind = $key + 1;
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    return Redirect::back()
                            ->withErrors(['email_contato' => 'E-mail do '.$ind.'º contato inválido'])
                            ->withInput();
                }
            }
        }

        if (!is_array($request->input('tel_contato')) || count($request->input('tel_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['tel_contato' => 'Devem ser informados ao menos 2 telefones de contatos'])
                            ->withInput();
        }   
        
        if (!is_array($request->input('cel_contato')) || count($request->input('cel_contato')) < 2) {
            return Redirect::back()
                            ->withErrors(['cel_contato' => 'Devem ser informados ao menos 2 celulares de contatos'])
                            ->withInput();
        } 
         
        if ($request->input('orgao_publico') == "N") {
            $f = 1;
            $c = 0;
            while ($request->hasFile('arquivo_documento_'.$f)) {
                $listaDocumentos[$f] = ListaDocumentos::find($request->input("documento_$f"));
                $arquivo = $request->file('arquivo_documento_'.$f);
                $nomeArquivo = 'upload/empresa/'.$cnpj.'/'.$listaDocumentos[$f]->documento.".pdf";

                if ($request->file('arquivo_documento_'.$f)->getMimeType() != "application/pdf") {
                    return Redirect::back()
                                ->withErrors(['msg' => "Os arquivos devem estar em formato PDF."])
                                ->withInput();
                } elseif (!$arquivo->move(public_path('upload/empresa/'.$cnpj),$listaDocumentos[$f]->documento.".pdf")) {
                    return Redirect::back()
                                ->withErrors(['msg' => "Erro ao copiar o $f.º arquivo."])
                                ->withInput();
                } else {
                    $listaArquivos[$f] = $nomeArquivo;
                    $f++;
                    $c++;
                }
            }
            
            if (!$c) {
                return Redirect::back()
                                ->withErrors(['msg' => 'Documentos solicitados devem ser informados'])
                                ->withInput();
            }
        }

        $empresa->razao_social          = $request->input('razao_social');
        $empresa->nome_fantasia         = $request->input('nome_fantasia');
        $empresa->cnpj                  = $cnpj;
        $empresa->incr_estadual         = $request->input('inscr_estadual');
        $empresa->endereco              = $request->input('endereco').' Bairro: '.$request->input('bairro').' Cidade: '.$request->input('cidade');
        if ($request->filled('complemento')) {
            $empresa->complemento_end = $request->input('complemento');
        }
        $empresa->cep                   = $request->input('cep');
        $empresa->area_atuacao          = implode(',', $request->input('atividades_estagio'));
        $empresa->num_funcionarios      = $request->input('num_funcionarios');
        $empresa->num_estagiarios       = $request->input('num_estagiarios');
        $empresa->descricao             = $request->input('descricao_local');
        $empresa->principais_produtos   = $request->input('principais_produtos');
        $empresa->servicos_atividades   = $request->input('servicos');
        $empresa->beneficios            = implode(',', $request->input('beneficio'));
        $empresa->contato_outras_areas  = $request->input('contato_aluno');
        $empresa->possui_farmaceutico   = $request->input('possui_orientador');

        $empresa->horarios_disponiveis  = ($request->filled('segunda'))?$request->input('segunda').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('terca'))?$request->input('terca').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('quarta'))?$request->input('quarta').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('quinta'))?$request->input('quinta').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('quarta'))?$request->input('sexta').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('horario_dia_util'))?'HDU: '.$request->input('horario_dia_util'):null;
        $empresa->horarios_disponiveis .= ($request->filled('sabado'))?$request->input('sabado').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('domingo'))?$request->input('domingo').',':null;
        $empresa->horarios_disponiveis .= ($request->filled('horario_fds'))?'HFS: '.$request->input('horario_fds'):null;

        $empresa->objetivos_educacionais= $request->input('objetivos');
        $empresa->representante_nome    = $request->input('nome_representante');
        $empresa->representante_cargo   = $request->input('cargo_representante');
        $empresa->representante_rg      = $request->input('rg_representante');
        $empresa->representante_cpf     = $request->input('cpf_representante');
        $empresa->representante_email   = $request->input('email_representante');
        $empresa->representante_telefone= $request->input('tel_representante');
        $empresa->representante_celular = $request->input('cel_representante');

        if (!$empresa->save()) {
            return Redirect::back()
                            ->withErrors(['msg' => "Erro ao salvar registro da empresa"])
                            ->withInput();
        }

        foreach($request->input('nome_contato') as $key=>$nomeContato) {
            $empresaContatos = new EmpresaContato;
            $empresaContatos->empresa_id= $empresa->id;
            $empresaContatos->nome      = $nomeContato;
            $empresaContatos->cargo     = $request->input('cargo_contato')[$key];
            $empresaContatos->rg        = $request->input('rg_contato')[$key];
            $empresaContatos->cpf       = $request->input('cpf_contato')[$key];
            $empresaContatos->email     = $request->input('email_contato')[$key];
            $empresaContatos->telefone  = $request->input('tel_contato')[$key];
            $empresaContatos->celular   = $request->input('cel_contato')[$key];

            $empresaContatos->save();
        }

        foreach($request->input('atividades_estagio') as $atividade) {
            $atividadeEmpresa = AtividadesEmpresas::find($atividade);
            $atividadeEmpresa->empresas()->save($empresa);
        }

        foreach($request->input('area_atencao') as $areaAtencao) {
            $areaAtencao = AreaAtencaoFarmaceutica::find($areaAtencao);
            $areaAtencao->areasAtencaoFarmaceutica()->save($empresa);
        }
        $convenio = new Convenio();
        $convenio->empresa_id = $empresa->id;
        $convenio->save();

        foreach($listaDocumentos as $key=>$listaD) {
            $doc_convenio = new ConvenioDocumento();
            $doc_convenio->convenio_id = $convenio->id;
            $doc_convenio->lista_documento_id = $listaD->id;
            $doc_convenio->data_documento = date_create('now');
            $doc_convenio->path_arquivo_pdf = $listaArquivos[$key];
            $doc_convenio->save();
        }

        print "<script> alert('Cadastro realizado com sucesso. Aguarde aprovação do convênio pela FCF'); </script>";
        
        return redirect()->route('empresa.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $lista_documentos = ListaDocumentos::where('tipo','EMPRESA')
                                           ->where('periodicidade','INICIAL')
                                           ->get();

        $area_atuacao = AtividadesEmpresas::orderBy('atividade')->get();

        $areaAtencao = AreaAtencaoFarmaceutica::orderBy('area')->get();

        return view('empresa.cadastro',['documentos'    => $lista_documentos
                                      , 'area_atuacao'  => $area_atuacao
                                      , 'areaAtencao'   => $areaAtencao
                                      , 'empresa'       => $empresa]
                   );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
