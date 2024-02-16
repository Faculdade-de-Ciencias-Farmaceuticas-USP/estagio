@extends('layouts.app')

@section('content')
@isset($success) {{ $success }} @endisset

<h1>Cadastro de Comissão de Estágios</h1>
<form action="@if(!empty($comissao->id)) {{ route('comissao.update', ['comissao' => $comissao->id]) }} @else {{ route('comissao.store') }} @endif" method="post" enctype="multipart/form-data">
    @csrf
    @if(!empty($comissao->id)) @method("PUT") @endif
    <div class="form-group row">
        <label for="nusp" class="col-sm-2 col-form-label">Número USP</label>
        <div class="col-2">
            <input type="text" class="form-control" id="nusp" name="nusp" value="{{ (!empty($comissao->nusp)) ? $comissao->nusp : old('nusp') }}" aria-describedby="nuspAjuda" placeholder="000000" required @if (!empty($comissao->nusp) || (isset($readonly) && $readonly == 1)) readonly @endif>
            <small id="nuspAjuda" class="form-text text-muted">Informe o número USP</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="nome" class="col-2 col-form-label">Nome</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nome" name="nome" value="{{ (!empty($comissao->nome)) ? $comissao->nome : old('nome') }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="email" name="email" value="{{ (!empty($comissao->email)) ? $comissao->email : old('email') }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="ramal" class="col-sm-2 col-form-label">Ramal</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="ramal" name="ramal" value="{{ (!empty($comissao->ramal)) ? $comissao->ramal : old('ramal') }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label @if (isset($readonly) && $readonly == 1) for="disabledSelect" @else for="papel" @endif class="col-sm-2 col-form-label">Papel</label>
        <div class="col-sm-5">
            <select class="form-control mr-sm-2" name="papel" @if (isset($readonly) && $readonly == 1) tabindex="-1" aria-disabled="true" id="disabledSelect" style="background: #EEE; pointer-events: none; touch-action: none;" @else id="papel" @endif>
                <option value="">Selecione</option>
                <option value="PRESIDENTE" @if ((!empty($comissao->papel) && $comissao->papel=='PRESIDENTE') || old('papel')=='PRESIDENTE') selected @endif>Presidente</option>
                <option value="MEMBRO" @if ((!empty($comissao->papel) && $comissao->papel=='MEMBRO') || old('papel')=='MEMBRO') selected @endif>Membro</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="dtIniMandato" class="col-sm-2 col-form-label">Início do Mandato</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="dtIniMandato" name="dtIniMandato" aria-describedby="dtiniAjuda" placeholder="dd/mm/aaaa" value="{{ (!empty($comissao->dtIniMandato)) ? date_create($comissao->dtIniMandato)->format('d/m/Y') : old('dtIniMandato') }}" required @if (isset($readonly) && $readonly == 1) readonly @endif>
            <small id="dtiniAjuda" class="form-text text-muted">Informe a data de início do mandato</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="dtFimMandato" class="col-sm-2 col-form-label">Início do Mandato</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="dtFimMandato" name="dtFimMandato" aria-describedby="dtfimAjuda" placeholder="dd/mm/aaaa" value="{{ (!empty($comissao->dtFimMandato)) ? date_create($comissao->dtFimMandato)->format('d/m/Y') : old('dtFimMandato') }}" required @if (isset($readonly) && $readonly == 1) readonly @endif>
            <small id="dtfimAjuda" class="form-text text-muted">Informe a data de início do mandato</small>
        </div>
    </div>
    @if (!empty($comissao->arquivo_assinatura)) 
    <p><a href="{{ $comissao->arquivo_assinatura }}">Baixe a assinatura</a></p>
    @endif
    @if (!isset($readonly) || $readonly == 0) 
    <div class="form-group row">
        <label for="arquivo_assinatura" class="col-sm-2 col-form-label">@empty($comissao->arquivo_assinatura) Arquivo de Assinatura @else Substitua a Assinatura @endempty</label>
        <div class="col-sm-5">
            <input type="file" name="arquivo_assinatura" id="arquivo_assinatura" class="form-control-file" aria-label="Assinatura do membro da Comissão" aria-describedby="inputGroup-sizing-sm">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
     @endif
    <button type="button" class="btn btn-primary" id="cancelar">@if (isset($readonly) && $readonly == 1) Voltar @else Cancelar @endif</button>
</form>
<script src="/js/cadastroComissao.js"></script>
@endsection