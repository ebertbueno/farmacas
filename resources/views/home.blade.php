@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width: 5% !important;">#</th>
                    <th style="width: 5% !important;">ID</th>
                    <th style="width: 20% !important;">Nome</th>
                    <th style="width: 20% !important;">Email</th>
                    <th style="width: 10% !important;">CPF</th>
                    <th style="width: 10% !important;">RG</th>
                    <th style="width: 10% !important;">Nascimento</th>
                    <th style="width: 10% !important;">CEP</th>
                    <th style="width: 10% !important;">Cidade</th>
                    <th style="width: 10% !important;">Estado</th>
                    <th style="width: 10% !important;">Telefone</th>
                    <th class="text-center" colspan="3" style="width: 10% !important;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data as $key => $listaColab )
                <tr>
                    <td>{!! ($key+1) !!}</td>
                    <td>{!! $listaColab['id'] !!}</td>
                    <td>{!! $listaColab['nome'] !!}</td>
                    <td>{!! $listaColab['email'] !!}</td>
                    <td>{!! $listaColab['cpf'] !!}</td>
                    <td>{!! $listaColab['rg'] !!}</td>
                    <td>{!! formataData($listaColab['nascimento']) !!}</td>
                    <td>{!! $listaColab['cep'] !!}</td>
                    <td>{!! $listaColab['cidade'] !!}</td>
                    <td>{!! $listaColab['estado'] !!}</td>
                    <td>{!! $listaColab['telefone'] !!}</td>
                    <td>
                        <a href="/colaboradores/{!! $listaColab['id'] !!}">
                            <li class="btn btn-info btn-block">Detalhar</li>
                        </a>
                    </td>
                    <td>
                        <a href="/colaboradores/{!! $listaColab['id'] !!}/edit">
                            <li class="btn btn-warning btn-block">Editar</li>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/colaboradores/{!! $listaColab['id'] !!}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="13">
                        {{ $data->links() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection