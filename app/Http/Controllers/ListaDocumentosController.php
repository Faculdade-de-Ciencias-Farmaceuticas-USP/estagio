<?php

namespace App\Http\Controllers;

use App\Models\ListaDocumentos;

use App\Http\Requests\ListaDocumentosRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ListaDocumentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('lista-documentos')) {
            abort(403);
        }
        
        $listaDocs = ListaDocumentos::simplePaginate(10);
        return view('comissao.documentos.lista', ['listaDocs' => $listaDocs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comissao.documentos.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListaDocumentosRequest $request)
    {
        $request->validated();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListaDocumentos  $listaDocumentos
     * @return \Illuminate\Http\Response
     */
    public function show(ListaDocumentos $listaDocumentos, int $id)
    {
        $objDoc = $listaDocumentos::find($id);
        return view('comissao.documentos.cadastro',['documento' => $objDoc, 'show' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaDocumentos  $listaDocumentos
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaDocumentos $listaDocumentos, int $id)
    {
        $objDoc = $listaDocumentos::find($id);
        return view('comissao.documentos.cadastro',['documento' => $objDoc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\ListaDocumentosRequest  $request
     * @param  \App\Models\ListaDocumentos  $listaDocumentos
     * @return \Illuminate\Http\Response
     */
    public function update(ListaDocumentosRequest $request, ListaDocumentos $listaDocumentos)
    {
        $listaDoc = $listaDocumentos->where('id',$request->input('idDocumento'))->get()->first();
        $request->validated();

        return Redirect::back()
                        ->with('success','Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaDocumentos  $listaDocumentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaDocumentos $listaDocumentos)
    {
        //
    }
}
