@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable" id="tabs-109311">
                <ul class="nav nav-tabs">
                    <li class="nav-item" style="width: 50% !important; text-align: center; font-weight: bold;">
                        <a class="nav-link" href="#tab1" data-toggle="tab">Dados cadastrais</a>
                    </li>
                    <li class="nav-item" style="width: 50% !important; text-align: center; font-weight: bold;">
                        <a class="nav-link active" href="#tab2" data-toggle="tab">Histórico de salário</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1" style="border: 1px solid #e6e6e6; border-top: 0px; padding: 10px;">
                        <div class="row" style="width: 98% !important; margin-left: 1% !important;">
                            <div class="corFundoCinza col-7"><label>Nome</label><br>{{ $data['nome'] }}</div>
                            <div class="corFundoCinza col-5"><label>Email</label><br>{{ $data['email'] }}</div>

                            <div class="col-3"><label>CPF</label><br>{{ $data['cpf'] }}</div>
                            <div class="col-2"><label>RG</label><br>{{ $data['rg'] }}</div>
                            <div class="col-2"><label>Nascimento</label><br>{{ $data['nascimento'] }}</div>
                            <div class="col-5"><label>Telefone</label><br>{{ $data['telefone'] }}</div>

                            <div class="corFundoCinza col-3"><label>CEP</label><br>{{ $data['cep'] }}</div>
                            <div class="corFundoCinza col-7"><label>Endereço</label><br>{{ $data['endereco'] }}</div>
                            <div class="corFundoCinza col-2"><label>Número</label><br>{{ $data['numero'] }}</div>

                            <div class="col-4"><label>Bairro</label><br>{{ $data['bairro'] }}</div>
                            <div class="col-5"><label>Cidade</label><br>{{ $data['cidade'] }}</div>
                            <div class="col-3"><label>Estado</label><br>{{ $data['estado'] }}</div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="tab2">
                        <p>
                            <table class="table table-striped">
                                <tr>
                                    <td style="width: 25% !important;">Data</td>
                                    <td style="width: 50% !important;">Salário atual</td>
                                    <td style="width: 25% !important;">Status</td>
                                </tr>
                                @forelse( $data['quaisSalarios'] as $key => $salario )
                                <tr class="bg-{!! is_null($salario['deleted_at']) ? 'success' : 'info' !!}">
                                    <td>{!! formataData($salario['created_at']) !!}</td>
                                    <td>{!! $salario['salario'] !!}</td>
                                    <td>{!! is_null($salario['deleted_at']) ? 'Vigente' : 'Até ' . formataData($salario['deleted_at']) !!}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Sem alterações de salário registrada</td>
                                </tr>
                                @endforelse
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .corFundoCinza {
        background-color: #f0f0f0;
    }
</style>