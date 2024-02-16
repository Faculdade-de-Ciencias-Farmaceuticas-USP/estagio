@extends('layouts.app')

@section('content')
  
    <h1>PROPOSTA DE CREDENCIAMENTO/CONVÊNIO DE ESTÁGIOS</h1>
    
    <p>De acordo com as normas de estágio da <b>Faculdade de Ciências Farmacêuticas da
    Universidade de São Paulo</b>, vimos solicitar credenciamento para que esta empresa possa servir
    como local de estágio para alunos desta Faculdade.<br/>
    Contando com as condições necessárias para estágio, quer do ponto de vista material, quer
    do ponto de vista do ensino, segue as informações para celebrar o convênio:
    </p>
    <form action="{{ route('empresa.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Razão Social</span>
            </div>
            <input type="text" name="razao_social" id="razao_social" value="{{ old('razao_social') }}" class="form-control" aria-label="Razão Social da Empmresa" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Nome Fantasia</span>
            </div>
            <input type="text" name="nome_fantasia" id="nome_fantasia" value="{{ old('nome_fantasia') }}" class="form-control" aria-label="Nome Fantasia da Empresa" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">CNPJ</span>
            </div>
            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" class="form-control" aria-label="CNPJ da Empresa" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Inscrição Estadual</span>
              </div>
              <input type="text" name="inscr_estadual" id="inscr_estadual" value="{{ old('inscr_estadual') }}" class="form-control" aria-label="CNPJ da Empresa" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Endereço</span>
            </div>
            <textarea name="endereco" id="endereco" class="form-control" aria-label="Endereço da Empresa" required>{{ old('endereco') }}</textarea>
        </div>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Complemento</span>
            </div>
            <input type="text" name="complemento" id="complemento" value="{{ old('complemento') }}" class="form-control" aria-label="Complemento de Endereço" aria-describedby="inputGroup-sizing-sm">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">CEP</span>
              </div>
              <input type="text" name="cep" id="cep" value="{{ old('cep') }}" class="form-control" aria-label="CEP do endereço da Empresa" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Bairro</span>
            </div>
            <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}" class="form-control" aria-label="Bairro onde a empresa está alocada" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Cidade</span>
            </div>
            <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}" class="form-control" aria-label="Cidade onde a Empresa está alocada" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px; text-align:justify;">Área de Atuação/<br/> Segmento</span>
            </div>
            <textarea name="area_atuacao" id="area_atuacao" class="form-control" aria-label="Área de atuação e/ou segmento da empresa." required> {{ old('area_atuacao') }} </textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Número de Funcionários</span>
          </div>
          <input type="number" name="num_funcionarios" id="num_funcionarios" value="{{ old('num_funcionarios') }}" class="form-control" aria-label="Quantidade de Funcionários da Empresa" aria-describedby="inputGroup-sizing-sm" required>
          <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Número de Estagiários</span>
            </div>
            <input type="number" name="num_estagiarios" id="num_estagiarios" value="{{ old('num_estagiarios') }}" class="form-control" aria-label="Quantidade de Estagiários da Empresa" aria-describedby="inputGroup-sizing-sm" required>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px; text-align:justify;">Descrição do local de <br/> trabalho</span>
          </div>
          <textarea name="descricao_local" id="descricao_local" class="form-control" aria-label="Descrição do local de trabalho" required>{{ old('descricao_local') }}</textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px;">Principais produtos</span>
          </div>
          <textarea name="principais_produtos" id="principais_produtos" class="form-control" aria-label="Produtos principais" required>{{ old('principais_produtos') }}</textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px; text-align:justify;">Serviços Desenvolvidos e <br/> Principais Atividades</span>
          </div>
          <textarea name="servicos" id="servicos" class="form-control" aria-label="Serviços desenvolvidos e principais atividades" required>{{ old('servicos') }}</textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend" style="width: 100%">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;">Possíveis áreas, atividades ou serviços em que o estagiário da FCF/USP poderá atuar
              nesta empresa para o estágio obrigatório em Atividades Farmacêuticas e não obrigatório:</span>
          </div>
          <div class="container mt-3 mb-3">
            @foreach ($area_atuacao as $key => $area)
            @php  $n = $key + 1  @endphp
            @if ($key == 0) <div class="row"> @endif
              <div class="col-4">
                <input class="form-check-input" type="checkbox" value="{{ $area->id }}" id="atividades_estagio_{{ $n }}" name="atividades_estagio[]" @if (is_array(old('atividades_estagio')) && array_search($area->id,old('atividades_estagio')) !== false) checked @endif> {{ $area->atividade }}
              </div>
            @if ( $n >= 3 && $n % 3 == 0 && $n < $area_atuacao->count()) </div><div class="row"> @elseif ($n == $area_atuacao->count()) </div> @endif
            @endforeach
          </div> 
        </div>

        <div class="input-group input-group-sm mb-3" style="align-items: center;">
          <div class="input-group-prepend" style="width: 100%">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%">Possíveis áreas, atividades ou serviços em que o estagiário da FCF/USP poderá
              atuar nesta empresa para o estágio obrigatório em Práticas/Atenção Farmacêuticas:</span>
          </div>
          <div class="container mt-3 " style="display: inline;">
            @foreach ($areaAtencao as $key => $area)
            @php  $n = $key + 1  @endphp
            @if ($key == 0) <div class="row"> @endif
              <div class="col-4">
                <input class="form-check-input" type="checkbox" value="{{ $area->id }}" id="area_atencao_{{ $n }}" name="area_atencao[]" @if(is_array(old('area_atencao')) && array_search($area->id,old('area_atencao'))!==false ) checked @endif> {{ $area->area }}
              </div>
            @if ( $n >= 3 && $n % 3 == 0 && $n < $areaAtencao->count()) </div><div class="row"> @elseif ($n == $areaAtencao->count()) </div> @endif
            @endforeach
          </div> 
        </div>

        <div class="input-group input-group-sm mb-3" style="align-items: center;">
          <div class="input-group-prepend" style="width: 100%">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%">Benefícios concedidos ao Estagiário</span>
          </div>
          <div class="container mt-3 " style="display: inline;">
            <div class="row">
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Bolsa auxilio" id="beneficio_1" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Bolsa auxilio',old('beneficio'))) checked @endif> Bolsa auxílio
              </div>
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Auxílio Transporte" id="beneficio_2" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Auxílio Transporte',old('beneficio'))) checked @endif> Auxílio Transporte
              </div>
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Refeicao" id="beneficio_3" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Refeicao',old('beneficio'))) checked @endif> Refeição
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Convênio Médico/Odontológico" id="beneficio_4" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Convênio Médico/Odontológico',old('beneficio'))) checked @endif> Convênio Médico/Odontológico
              </div>
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Cursos e Treinamentos" id="beneficio_5" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Cursos e Treinamentos',old('beneficio'))) checked @endif> Cursos e Treinamentos
              </div>
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Seguro Acidentes Pessoais" id="beneficio_6" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Seguro Acidentes Pessoais',old('beneficio'))) checked @endif> Seguro Acidentes Pessoais
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" value="Outros" id="beneficio_7" name="beneficio[]" @if(is_array(old('beneficio')) && array_search('Outros',old('beneficio'))) checked @endif onclick="if ($(this).is(':checked')) { $('#outros_beneficios').show(); } else { $('#outros_beneficios').hide(); }"> Outros <div id="outros_beneficios" style="display: {{ !empty(old('outros_beneficios')) ? 'inline' : 'none' }}; float: right; margin-right: 853px;">, especificar: <input type="text" name="outros_beneficios" value="{{ old('outros_beneficios') }}" class="form-control" aria-label="Outros benefícios, separar por vírgula" aria-describedby="inputGroup-sizing-sm"></div>
              </div>
            </div>
          </div> 
        </div>

        <div class="input-group input-group-sm mb-3" style="align-items: center; text-align:center;">
          <div class="input-group-prepend" style="width: 100%; text-align:center;">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;"><b>Obs. Para estágios não obrigatório, é compulsório o local concedente de estágios conceder:
              bolsa, auxílio transporte e seguro acidentes pessoais.</b></span>
          </div>
        </div>

        <div class="input-group input-group-sm mb-3" style="align-items: justify;">
          <div class="container mt-3 " style="display: inline;">
            <div class="row">
              <div class="col-sm">A empresa possui estagiários na área de farmácia?</div>
              <div class="col-sm">
                <input class="form-check-input" type="radio" value="1" id="estagiarioF_1" name="estagiarioF" required @if(old('estagiarioF')==1) checked @endif> Sim &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" value="0" id="estagiarioF_2" name="estagiarioF" required @if(!is_null(old('estagiarioF')) && old('estagiarioF')==0) checked @endif> Não
              </div>
            </div>
            <div class="row">
              <div class="col-sm">O aluno estagiário terá contato com profissionais de outras áreas?</div>
              <div class="col-sm">
                <input class="form-check-input" type="radio" value="1" id="contato_aluno_1" name="contato_aluno" required @if(old('contato_aluno')==1) checked @endif> Sim &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" value="0" id="contato_aluno_2" name="contato_aluno" required @if(!is_null(old('contato_aluno')) && old('contato_aluno')==0) checked @endif> Não
              </div>
            </div>
            <div class="row">
              <div class="col-sm">A empresa possui profissionais formados em Farmácia para orientar estagiários?</div>
              <div class="col-sm">
                <input class="form-check-input" type="radio" value="1" id="possui_orientador_1" name="possui_orientador" required @if(old('possui_orientador')==1) checked @endif> Sim &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" value="0" id="possui_orientador_2" name="possui_orientador" required @if(!is_null(old('possui_orientador')) && old('possui_orientador')==0) checked @endif> Não
              </div>
            </div>
          </div>
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend" style="width: 100%">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;">Horários Disponíveis para Estágio</span>
          </div>
          <div class="container mt-3 mb-3" style="display: inline;">
            <div class="row">
              <div class="col-sm">Semana</div>
              <div class="col-sm">Fim de Semana</div>
            </div>
            <div class="row">
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" name="segunda" id="segunda" value="1" @if (old('segunda') == 1) checked @endif>Segunda-feira <br/>
                <input class="form-check-input" type="checkbox" name="terca" id="terca" value="2" @if (old('terca') == 2) checked @endif>Terça-feira<br/>
                <input class="form-check-input" type="checkbox" name="quarta" id="quarta" value="3" @if (old('quarta') == 3) checked @endif>Quarta-feira <br/>
                <input class="form-check-input" type="checkbox" name="quinta" id="quinta" value="4" @if (old('quinta') == 4) checked @endif >Quinta-feira <br/>
                <input class="form-check-input" type="checkbox" name="sexta" id="sexta" value="5" @if (old('sexta') == 5) checked @endif>Sexta-feira <br/>
              </div>
              <div class="col-sm">
                <input class="form-check-input" type="checkbox" name="sabado" id="sabado" value="6" @if (old('sabado') == 6) checked @endif>Sábado <br/>
                <input class="form-check-input" type="checkbox" name="domingo" id="domingo" value="0" @if (!is_null(old('domingo')) && old('domingo') == 0) checked @endif>Domingo <br/>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">Horário: <input type="text" name="horario_dia_util" id="horario_dia_util" value="{{ old('horario_dia_util') }}" class="form-control" aria-label="Horário dia útil" aria-describedby="inputGroup-sizing-sm"></div>
              <div class="col-sm">Horário: <input type="text" name="horario_fds" id="horario_fds" value="{{ old('horario_fds') }}" class="form-control" aria-label="Horário fim de semana" aria-describedby="inputGroup-sizing-sm"></div>
            </div>
          </div>
        </div>
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px; text-align:justify;">Objetivos Educacionais <br/> do Estágio</span>
          </div>
          <textarea name="objetivos" id="objetivos" class="form-control" aria-label="Objetivos educaionais do estágio" required>{{ old('objetivos') }}</textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend" style="width: 100%">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;"><b>Indicar o representante legal, responsável pela assinatura do convênio:</b></span>
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Nome:</span>
            </div>
            <input type="text" name="nome_representante" id="nome_representante" value="{{ old('nome_representante') }}" class="form-control" aria-label="Nome representante legal" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Cargo:</span>              
            </div>
            <input type="text" name="cargo_representante" id="cargo_representante" value="{{ old('cargo_representante') }}" class="form-control" aria-label="Cargo representante legal" aria-describedby="inputGroup-sizing-sm" required >
        </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">RG:</span>
            </div>
            <input type="text" name="rg_representante" id="rg_representante" value="{{ old('rg_representante') }}" class="form-control" aria-label="RG representante legal" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">CPF:</span>              
            </div>
            <input type="text" name="cpf_representante" id="cpf_representante" value="{{ old('cpf_representante') }}" class="form-control" aria-label="CPF representante legal" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">E-mail:</span>
            </div>
            <input type="text" name="email_representante" id="email_representante" value="{{ old('email_representante'); }}" class="form-control" aria-label="E-mail do representante legal" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Telefone:</span>              
            </div>
            <input type="text" name="tel_representante" id="tel_representante" value="{{ old('tel_representante') }}" class="form-control" aria-label="Telefone representante legal" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Celular:</span>              
            </div>
            <input type="text" name="cel_representante" id="cel_representante" value="{{ old('cel_representante') }}" class="form-control" aria-label="Celular representante legal" aria-describedby="inputGroup-sizing-sm" required>
          </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend" style="width: 100%">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;"><b>Indicar ao menos <u>dois</u> responsáveis pelo contato e outros dados:</b></span>
            </div>
            <div class="input-group-prepend" style="width: 100%">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;">Primeiro Contato</span>
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Nome:</span>
            </div>
            <input type="text" name="nome_contato[]" id="nome_contato_1" value="{{ is_array(old('nome_contato'))?old('nome_contato')[0]:null; }}" class="form-control" aria-label="Nome primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Cargo:</span>              
            </div>
            <input type="text" name="cargo_contato[]" id="cargo_contato_1" value="{{ is_array(old('cargo_contato'))?old('cargo_contato')[0]:null; }}" class="form-control" aria-label="Cargo primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">RG:</span>
            </div>
            <input type="text" name="rg_contato[]" id="rg_contato_1" value="{{ is_array(old('rg_contato'))?old('rg_contato')[0]:null; }}" class="form-control" aria-label="RG do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">CPF:</span>              
            </div>
            <input type="text" name="cpf_contato[]" id="cpf_contato_1" value="{{ is_array(old('cpf_contato'))?old('cpf_contato')[0]:null; }}" class="form-control" aria-label="CPF do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">E-mail:</span>
            </div>
            <input type="text" name="email_contato[]" id="email_contato_1" value="{{ is_array(old('email_contato'))?old('email_contato')[0]:null; }}" class="form-control" aria-label="E-mail do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Telefone:</span>              
            </div>
            <input type="text" name="tel_contato[]" id="tel_contato_1" value="{{ is_array(old('tel_contato'))?old('tel_contato')[0]:null; }}" class="form-control" aria-label="Telefone do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Celular:</span>              
            </div>
            <input type="text" name="cel_contato[]" id="cel_contato_1" value="{{ is_array(old('cel_contato'))?old('cel_contato')[0]:null; }}" class="form-control" aria-label="Celular do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend" style="width: 100%">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%;">Segundo Contato</span>
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Nome:</span>
            </div>
            <input type="text" name="nome_contato[]" id="nome_contato_2" value="{{ is_array(old('nome_contato'))?old('nome_contato')[1]:null; }}" class="form-control" aria-label="Nome segundo contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Cargo:</span>              
            </div>
            <input type="text" name="cargo_contato[]" id="cargo_contato_2" value="{{ is_array(old('cargo_contato'))?old('cargo_contato')[1]:null; }}" class="form-control" aria-label="Cargo segundo contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">RG:</span>
            </div>
            <input type="text" name="rg_contato[]" id="rg_contato_2" value="{{ is_array(old('rg_contato'))?old('rg_contato')[1]:null; }}" class="form-control" aria-label="RG do segundo contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">CPF:</span>              
            </div>
            <input type="text" name="cpf_contato[]" id="cpf_contato_2" value="{{ is_array(old('cpf_contato'))?old('cpf_contato')[1]:null; }}" class="form-control" aria-label="CPF do segundo contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">E-mail:</span>
            </div>
            <input type="text" name="email_contato[]" id="email_contato_2" value="{{ is_array(old('email_contato'))?old('email_contato')[1]:null; }}" class="form-control" aria-label="E-mail do segundo contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Telefone:</span>              
            </div>
            <input type="text" name="tel_contato[]" id="tel_contato_2" value="{{ is_array(old('tel_contato'))?old('tel_contato')[1]:null; }}" class="form-control" aria-label="Telefone do segundo contato" aria-describedby="inputGroup-sizing-sm" required>
            <div class="input-group-prepend">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">Celular:</span>              
            </div>
            <input type="text" name="cel_contato[]" id="cel_contato_2" value="{{ is_array(old('cel_contato'))?old('cel_contato')[1]:null; }}" class="form-control" aria-label="Celular do primeiro contato" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 180px">É uma empresa pública?</span>
            </div>
            <div class="row ml-3">
              <div class="col-sm">
                <input class="form-check-input" type="radio" value="S" id="orgao_publico_s" name="orgao_publico" @if(old('orgao_publico')=='S') checked @endif required> Sim &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" value="N" id="orgao_publico_n" name="orgao_publico" @if(old('orgao_publico')=='N') checked @endif required> Não
              </div>
            </div>
            </div>

          <div class="input-group input-group-sm mb-3" id="divDocumentos" style="display: inline;">
            <div class="input-group-prepend" style="width: 100%">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%">Envie os documentos abaixo</span>
            </div>
            @foreach($documentos as $key=>$doc)
            @php $k = $key + 1; @endphp
            <div class="input-group-prepend" style="width: 100%">  
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 100%">{{ $doc->documento }} ({{ $doc->descricao }})</span>              
            </div>
            <input type="hidden" name="documento_{{ $k }}" value = "{{ $doc->id }}">
            <input type="file" name="arquivo_documento_{{ $k }}" id="arquivo_documento_{{ $k }}" class="form-control-file" aria-label="Comprovante do representante legal" aria-describedby="inputGroup-sizing-sm">
            @endforeach
          </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <script src="js/cadastroEmpresa.js"></script>
@endsection