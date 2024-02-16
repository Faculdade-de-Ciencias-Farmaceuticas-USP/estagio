@extends('layouts.app')

@section('content')
<h1>@isset($documento)Edição @else Cadastro @endisset de Documentos</h1>

<form id="cadastroDocs" method="post" action="@isset($documento) {{ route('documentos.update', ['documento' => $documento]); }} @else {{ route('documentos.store')}} @endisset">
    @csrf
    @isset($documento) 
        @method('PUT') 
        <input type="hidden" name="idDocumento" value="{{ $documento->id }}">
    @endisset
    <input type="hidden" name="sistema" value="0">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Tipo de Documento</span>
        </div>
        <select name="tipoDocumento" id="tipoDocumento" aria-describedby="tipoDocAjuda" @isset($show) disabled tabindex="-1" aria-disabled="true" @endisset >
                <option value="">Selecione</option>
                <option value="EMPRESA" @if((isset($documento) && $documento->tipo == "EMPRESA") || old('tipoDocumento') == "EMPRESA") selected @endif >Empresa</option>
                <option value="ESTAGIO" @if((isset($documento) && $documento->tipo == "ESTAGIO") || old('tipoDocumento') == "ESTAGIO") selected @endif >Estágio</option>
                <option value="EQUIVALENCIA" @if((isset($documento) && $documento->tipo == "EQUIVALENCIA") || old('tipoDocumento') == "EQUIVALENCIA") selected @endif >Equivalência</option>
        </select>
        <small id="tipoDocAjuda" class="form-text text-muted">Informe em que situação o documento precisa ser apresentado.</small>
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Documento</span>
        </div>
        <input type="text" name="documento" id="documento" value="@isset($documento){{ $documento->documento }} @else {{ old('documento') }} @endisset" class="form-control" aria-label="Descrição do Documento" aria-describedby="inputGroup-sizing-sm" @isset($show) readonly @endisset >
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Descrição</span>
        </div>
        <textarea name="descricao_documento" id="descricao_documento" class="form-control" aria-label="Descrição do documento. Aparece como orientação" @isset($show) readonly @endisset >@isset($documento) {{ $documento->descricao }} @else {{ old('descricao_documento') }} @endisset</textarea>
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Periodicidade</span>
            
        </div>
        <select name="periodicidade" id="periodicidade" aria-describedby="periodicidadeAjuda" @isset($show) disabled tabindex="-1" aria-disabled="true" @endisset >
                <option value="">Selecione</option>
                <option value="INICIAL" @if((isset($documento) && $documento->periodicidade == "INICIAL") || old('periodicidade') == 'INICIAL') selected @endif>Inicial</option>
                <option value="PERIODICO" @if((isset($documento) && $documento->periodicidade == "PERIODICO") || old('periodicidade') == 'PERIODICO') selected @endif >Períodico</option> 
                <option value="OPCIONAL" @if(isset($documento) && ($documento->periodicidade == "OPCIONAL") || old('periodicidade') == 'OPCIONAL') selected @endif>Opcional</option>
                <option value="FINAL" @if(isset($documento) && ($documento->periodicidade == "FINAL") || old('periodicidade') == 'FINAL') selected @endif >Final</option>
        </select>
    </div>
    <div class="input-group input-group-sm mb-3">
        <small id="periodicidadeAjuda" class="form-text text-muted">
            Inicial: somente no cadastro<br/>
            Periodico: em períodos definidos (por exemplo: semanal)<br/>
            Opcional: pode ou não ser apresentado<br/>
            Final: somente na finalização, por exemplo, de um estágio<br/>
        </small>
    </div>
    <div class="input-group input-group-sm mb-3" id="divPeriodo" style="@if ((isset($documento) && $documento->periodicidade == 'PERIODICO') || old('periodicidade') == 'PERIODICO') display:inline; @else display:none; @endif">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Período</span>
        </div>
        <select name="recorrencia" id="recorrencia" @isset($show) disabled tabindex="-1" aria-disabled="true" @endisset >
            <option value="">Selecione</option>
            <option value="MES" @if ((isset($documento) && $documento->prazo_unidade == 'MES') || old('recorrencia') == 'MES') selected @endif>Mensal</option>
            <option value="ANO" @if ((isset($documento) && $documento->prazo_unidade == 'ANO') || old('recorrencia') == 'ANO') selected @endif>Anual</option>
            <option value="SEMANAS" @if ((isset($documento) && $documento->prazo_unidade == 'SEMANAS') || old('recorrencia') == 'SEMANAS') selected @endif>Semanal</option>
            <option value="DIAS" @if ((isset($documento) && $documento->prazo_unidade == 'DIAS') || old('recorrencia') == 'DIAS') selected @endif>Diário</option>
        </select>
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Intervalo</span>
        </div>
        <input type="text" name="prazo" id="prazo" value="@isset($documento) {{ $documento->prazo }} @else {{ old('prazo') }} @endisset" @isset($show) readonly @endisset >
    </div>
    @if (!isset($show))
    <input type="submit" value="Salvar" id="salvarDoc">
    @endif
</form>

<script>
    $(document).ready(function() {
        $('#periodicidade').on("change", function() {
            if ($(this).val() == "PERIODICO") {
                $('#divPeriodo').show();
            } else {
                $('#divPeriodo').hide();
            }
        });
    });
</script>

@endsection