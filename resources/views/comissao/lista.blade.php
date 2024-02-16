@extends('layouts.app')

@section('content')

<nav class="nav">
    <a class="nav-link active" href="{{ route('comissao.create') }}">Novo Cadastro</a>
</nav>

<h1>Comissão de Estágios</h1>

<div class="table-responsive-xl">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">N.º USP</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Papel</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($listComissao->isEmpty())
            <tr><td colspan="5">Nenhum registro encontrado</td></tr>
            @else
            @foreach ($listComissao as $comissao)
            <tr>
                <td scope="row">{{ $comissao->nusp }}</td>
                <td>{{ $comissao->nome }}</td>
                <td>{{ $comissao->email }}</td>
                <td>{{ $comissao->papel }}</td>
                <td style="text-align: center;">
                    <span style="float: left;"><a href="{{ route('comissao.show',['comissao' => $comissao ]) }}">Visualizar</a> | &nbsp;</span>
                    <span style="float: left;"><a href="{{ route('comissao.edit',['comissao' => $comissao ]) }}">Editar</a> | </span>  
                    <form id="deleteComissao_{{ $comissao->id }}" action="{{ route('comissao.destroy', ['comissao' => $comissao->id ])}}" method="post"> 
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

@endsection