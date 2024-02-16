<?php

namespace App\Http\Controllers;

use App\Models\ComissaoEstagios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComissaoEstagiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listComissao = ComissaoEstagios::where('dtIniMandato','<=',date_create('now')->format('Y/m/d'))
                                    ->where('dtFimMandato','>=',date_create('now')->format('Y/m/d'))
                                    ->get();

        foreach($listComissao as $key => $comissao) {
            $pessoa = User::obterDadosPessoa($comissao->nusp);
            $listComissao[$key]->nome  = $pessoa['nompes'];
            $listComissao[$key]->email = $pessoa['email'];
            $listComissao[$key]->ramal = $pessoa['ramal'];
        }
        return view('comissao.lista',['listComissao'=>$listComissao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comissao.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = ['nusp'                => ['required','numeric']
                    , 'papel'               => ['required']
                    , 'dtIniMandato'        => ['required','date_format:d/m/Y']
                    , 'dtFimMandato'        => ['required','date_format:d/m/Y']
                    , 'arquivo_assinatura'  => ['file','mimes:png,jpg'] 
                    ];
        
        $msgErro = ['required' => 'O :attribute deve ser informado'
                   ,'dtIniMandato.required' => "A data de início do mandato deve ser informada"
                   ,'dtFimMandato.required' => "A data final do mandato deve ser informada"];
        
        $request->validate($validacao,$msgErro);

        $dtIni = explode("/",$request->input('dtIniMandato'));
        $dtFim = explode("/",$request->input('dtFimMandato'));

        $atualizar = false;
        $comissao = ComissaoEstagios::where('nusp',$request->input('nusp'))
                                    ->onlyTrashed()
                                    ->get();

        if ($comissao->isEmpty()) {
            $comissao = new ComissaoEstagios();
        } else {
            $comissao = $comissao->first();
            $atualizar = true;
        }

        if ($request->input('papel') == 'PRESIDENTE') {
            $presidente = ComissaoEstagios::where('papel','PRESIDENTE')
                                        ->where('dtIniMandato','<=',date_create('now')->format('Y/m/d'))
                                        ->where('dtFimMandato','>=',date_create('now')->format('Y/m/d'))
                                        ->where('nusp','<>',$request->input('nusp'))
                                        ->count();
            
            if ($presidente > 0) {
                return Redirect::back()
                                ->withErrors(['papel'=>'Já existe um presidente cadastrado, não é permitido haver dois.'])
                                ->withInput();
            }
        }

        if($atualizar === true) {
            $comissao->restore();
        }
        
        $comissao->nusp = $request->input('nusp');
        $comissao->papel = $request->input('papel');
        $comissao->dtIniMandato = $dtIni[2]."/".$dtIni[1]."/".$dtIni[0];
        $comissao->dtFimMandato = $dtFim[2]."/".$dtFim[1]."/".$dtFim[0];

        if ($request->hasFile('arquivo_assinatura') && $request->file('arquivo_assinatura')->isValid()) {
            $arquivo = $request->file('path_arq_tcc');
            $nomeArq = $arquivo->getClientOriginalName();

            if (!$arquivo->move(public_path('storage/assinatura'),$nomeArq)) {
                return "<script> alert('Comissoa-Erro ao copiar o arquivo.'); 
                                       window.location.assign('".route('home')."');
                    </script>";
            }
            $comissao->assinatura = "/storage/assinatura/$nomeArq";
        }

        if ($atualizar === true) {
            $result = $comissao->update();
        } else {
            $result = $comissao->save();
        }

        if ($result) {
            print "<script>alert('Cadastro realizado com sucesso'); </script>";
        } else {
            print "<script>alert('Erro ao realizar cadastro'); </script>";
        }

        return redirect()->route('comissao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComissaoEstagios  $comissaoEstagios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comissao = ComissaoEstagios::find($id);
        $pessoa = User::obterDadosPessoa($comissao->nusp);
        $comissao->nome = $pessoa['nompes'];
        $comissao->email = $pessoa['email'];
        $comissao->ramal = $pessoa['ramal'];

        return view('comissao.cadastro',['comissao' => $comissao, 'readonly' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComissaoEstagios  $comissaoEstagios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $comissao = ComissaoEstagios::find($id);
        $pessoa = User::obterDadosPessoa($comissao->nusp);
        $comissao->nome = $pessoa['nompes'];
        $comissao->email = $pessoa['email'];
        $comissao->ramal = $pessoa['ramal'];

        return view('comissao.cadastro',['comissao' => $comissao, 'readonly' => 0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComissaoEstagios  $comissaoEstagios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacao = ['nusp'                => ['required','numeric']
                    , 'papel'               => ['required']
                    , 'dtIniMandato'        => ['required','date_format:d/m/Y']
                    , 'dtFimMandato'        => ['required','date_format:d/m/Y']
                    , 'arquivo_assinatura'  => ['file','mimes:png,jpg'] 
                    ];
        
        $msgErro = ['required' => 'O :attribute deve ser informado'
                   ,'dtIniMandato.required' => "A data de início do mandato deve ser informada"
                   ,'dtFimMandato.required' => "A data final do mandato deve ser informada"];
        
        $request->validate($validacao,$msgErro);

        $dtIni = explode("/",$request->input('dtIniMandato'));
        $dtFim = explode("/",$request->input('dtFimMandato'));


        if ($request->input('papel') == 'PRESIDENTE') {
            $presidente = ComissaoEstagios::where('papel','PRESIDENTE')
                                        ->where('dtIniMandato','<=',date_create('now')->format('Y/m/d'))
                                        ->where('dtFimMandato','>=',date_create('now')->format('Y/m/d'))
                                        ->where('nusp','<>',$request->input('nusp'))
                                        ->count();
            
            if ($presidente > 0) {
                return Redirect::back()
                                ->withErrors(['papel'=>'Já existe um presidente cadastrado, não é permitido haver dois.'])
                                ->withInput();
            }
        }

        $comissao = ComissaoEstagios::find($id);
        $comissao->papel = $request->input('papel');
        $comissao->dtIniMandato = $dtIni[2]."/".$dtIni[1]."/".$dtIni[0];
        $comissao->dtFimMandato = $dtFim[2]."/".$dtFim[1]."/".$dtFim[0];

        if ($request->hasFile('arquivo_assinatura') && $request->file('arquivo_assinatura')->isValid()) {
            $arquivo = $request->file('path_arq_tcc');
            $nomeArq = $arquivo->getClientOriginalName();

            if (!$arquivo->move(public_path('storage/assinatura'),$nomeArq)) {
                return "<script> alert('Comissoa-Erro ao copiar o arquivo.'); 
                                       window.location.assign('".route('home')."');
                    </script>";
            } else {
                if ($comissao->assinatura <> "/storage/assinatura/$nomeArq") {
                    File::delete($comissao->assinatura);
                }
            }
            $comissao->assinatura = "/storage/assinatura/$nomeArq";
        }

        if ($comissao->update()) {
            print "<script>alert('Cadastro atualizado com sucesso'); </script>";
        } else {
            print "<script>alert('Erro ao atualizar cadastro'); </script>";
        }

        return redirect()->route('comissao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComissaoEstagios  $comissaoEstagios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comissao = ComissaoEstagios::find($id);
        $comissao->delete();

        print "<script>alert('Registro exluído com sucesso'); </script>";

        return redirect()->route('comissao.index');
    }

    /**
     * Método para retorno dos dados de Membro da Comissão
     */
    public function dadosComissao($idPessoa) {

        $dados = User::obterDadosPessoa($idPessoa);
        $comissao = new \stdClass();
        $comissao->nome  = $dados['nompes'];
        $comissao->email = $dados['email'];
        $comissao->ramal = $dados['ramal'];
        
        $objComissao = ComissaoEstagios::where('nusp',$idPessoa)
                                    ->where('dtIniMandato','<=', date_create('now')->format('Y-m-d'))
                                    ->where('dtFimMandato','>=', date_create('now')->format('Y-m-d'))
                                    ->get();

        if (!$objComissao->isEmpty()) {
            $comissao->papel = $objComissao->first()->papel;
        } else {
            $comissao->papel = "";
        }

        return $comissao;
        
    }
}
