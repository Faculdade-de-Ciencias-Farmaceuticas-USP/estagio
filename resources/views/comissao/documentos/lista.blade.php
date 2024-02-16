@extends('layouts.app')

@section('content')

<nav class="nav">
    <a class="nav-link active" href="{{ route('documentos.create') }}">Novo Cadastro</a>
</nav>

<h1>Lista de Documentos</h1>

<div class="table-responsive-xl">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Tipo</th>
            <th scope="col">Documento</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($listaDocs->isEmpty())
            <tr><td colspan="5">Nenhum registro encontrado</td></tr>
            @else
            @foreach ($listaDocs as $listaD)
            <tr>
                <td scope="row">{{ $listaD->tipo }}</td>
                <td>{{ $listaD->documento }}</td>
                <td>{{ $listaD->descricao }}</td>
                <td style="text-align: center;">
                    <span style="float: left;"><a href="{{ route('documentos.show',['documento' => $listaD ]) }}">Visualizar</a> | &nbsp;</span>
                    <span style="float: left;"><a href="{{ route('documentos.edit',['documento' => $listaD ]) }}">Editar</a> | </span>  
                    <form id="deleteComissao_{{ $listaD->id }}" action="{{ route('documentos.destroy', ['documento' => $listaD->id ])}}" method="post"> 
                        @csrf
                        @method('DELETE') 
                        <input type="submit" value="Excluir" style="background-color:transparent; border: 0px; float: left; color: #007bff;" onmouseover="return $(this).css({'color':'blue','text-decoration':'underline'})" onmouseout="return $(this).css({'color':'#007bff','text-decoration':'none'})" onclick="if (confirm('Tem certeza que deseja excluir o registro? Essa ação não tem retorno.')){ return true; } else { return false; }">
                    </form></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
{{ $listaDocs->links() }}
@endsection