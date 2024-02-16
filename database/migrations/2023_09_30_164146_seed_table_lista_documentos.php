<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class SeedTableListaDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('lista_documentos')->insert([
            'tipo'          => 'EMPRESA',
            'documento'     => 'CND - Emissão de Certidão Negativa',
            'descricao'     => 'Verifique no site',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EMPRESA',
            'documento'     => 'CADIN - Secretaria da Fazenda - Governo do Estado de São Paulo',
            'descricao'     => 'Verifique no site https://www.fazenda.sp.gov.br/cadin_estadual/pages/publ/cadin.aspx',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EMPRESA',
            'documento'     => 'FGTS - Consulta Regularidade do Empregador',
            'descricao'     => 'Verifique no site https://consulta-crf.caixa.gov.br/consultacrf/pages/consultaEmpregador.jsf',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EMPRESA',
            'documento'     => 'CNPJ - Receita Federal do Brasil',
            'descricao'     => 'Verifique no site',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'ESTAGIO',
            'documento'     => 'Termo de Compromisso',
            'descricao'     => 'No caso de órgãos de integração (CIEE, NUBE, etc) estarem envolvidos e desejarem cópia do termo, enviar o número de cópias a mais. A FCF-USP não assina nenhum tipo de documento com timbrado de órgãos de integração ou diferente dos modelos oficiais disponíveis',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 1,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'ESTAGIO',
            'documento'     => 'Historico Escolar',
            'descricao'     => 'Histórico escolar',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'ESTAGIO',
            'documento'     => 'Atestado de matricula com Disciplinas',
            'descricao'     => 'Atestado de matricula com disciplinas (os dois últimos gerados pelo Jupiterweb)',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'               => 'ESTAGIO',
            'documento'          => 'Termo Aditivo Unificado',
            'descricao'          => 'No caso de qualquer tipo de alteração no Termo de compromisso inicial (Orientador, Vigência, Atividades, Bolsa, etc), a empresa deverá providenciar, devidamente preenchido e assinado, o Termo de Aditivo Unificado, em papel timbrado.',
            'periodicidade'      => 'OPCIONAL',
            'gera_doc_word'      => 1,
            'sistema'            => 1,
            'nome_tabela_sistema'=> 'termos_aditivos',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'               => 'ESTAGIO',
            'documento'          => 'Comunicado de Encerramento',
            'descricao'          => 'No caso de encerramento do estágio, a empresa deve providenciar, devidamente preenchido e assinado, o Comunicado de Encerramento, em papel timbrado',
            'periodicidade'      => 'FINAL',
            'prazo_final'        => date('Y').'/12/31',
            'gera_doc_word'      => 1,
            'sistema'            => 1,
            'nome_tabela_sistema'=> 'comunicado_encerramento',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'               => 'ESTAGIO',
            'documento'          => 'Relatório Parcial',
            'descricao'          => 'Todos os estágios, obrigatórios  ou  não-obrigatórios, devem gerar um relatório parcial a cada 6 meses de estágio realizado',
            'periodicidade'      => 'PERIODICO',
            'prazo_unidade'      => 'MES',
            'prazo'              => 6,
            'gera_doc_word'      => 1,
            'sistema'            => 1,
            'nome_tabela_sistema'=> 'relatorio_parcial',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'               => 'ESTAGIO',
            'documento'          => 'Relatório Final',
            'descricao'          => 'O relatório final deve ser entregue, devidamente preenchido e assinado, pelo aluno e pelo orientador, ao final do estágio ou no prazo exigido pela(s) disciplina(s) de Estágio',
            'periodicidade'      => 'FINAL',
            'prazo_final'        => date('Y').'/12/31',
            'gera_doc_word'      => 1,
            'sistema'            => 1,
            'nome_tabela_sistema'=> 'relatorio_final',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'               => 'ESTAGIO',
            'documento'          => 'Relatório Complementar',
            'descricao'          => 'Caso o aluno entregue o relatório final para a(s) disciplina(s) de estágio, mas continue estagiando na empresa, deve complementar seu relatório ao final da atividade.',
            'periodicidade'      => 'OPCIONAL',
            'gera_doc_word'      => 1,
            'sistema'            => 1,
            'nome_tabela_sistema'=> 'relatorio_final',
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'ESTAGIO',
            'documento'     => 'Relatorio Complementar - Declaração',
            'descricao'     => 'Caso o aluno entregue o relatório final para a(s) disciplina(s) de estágio, mas continue estagiando na empresa, deve complementar seu relatório ao final da atividade.',
            'periodicidade' => 'OPCIONAL',
            'gera_doc_word' => 1,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Digitalização da carteira de trabalho',
            'descricao'     => 'Digitalização da carteira de trabalho',
            'periodicidade' => 'OPCIONAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Atestado de trabalho informando atividades exercidas',
            'descricao'     => 'Atestado de trabalho informando atividades exercidas',
            'periodicidade' => 'OPCIONAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Histórico escolar',
            'descricao'     => 'Histórico escolar',
            'periodicidade' => 'OPCIONAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Atestado de Matrícula',
            'descricao'     => 'Atestado de Matrícula',
            'periodicidade' => 'OPCIONAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Formulario de Solicitacao de Estágios',
            'descricao'     => 'Formulário de solicitação de estágio - escrever equivalência na frente do tipo de estágio',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 1,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);

        DB::table('lista_documentos')->insert([
            'tipo'          => 'EQUIVALENCIA',
            'documento'     => 'Relatório Final',
            'descricao'     => 'Relatório Final',
            'periodicidade' => 'INICIAL',
            'gera_doc_word' => 0,
            'sistema'       => 0,
            'created_at'    => date_create('now')->format('Y/m/d'),
            'updated_at'    => date_create('now')->format('Y/m/d')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
