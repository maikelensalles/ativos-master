
@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Dados Cadastrais</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 mb-xl-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="table-responsive mb-4 mb-xl-6">
                            <table class="table align-items-center table-flush">
                                <br>
                                <ul>
                                    <p><strong>Nome: </strong>{{ $data->name }}</p>
                                    <p><strong>Email: </strong>{{ $data->email }}</p>
                                    <p><strong>Data de Nascimento: </strong>{{ $data->nascimento }}</p>
                                    <p><strong>Gênero: </strong>{{ $data->genero }}</p>
                                    <p><strong>CPF: </strong>{{ $data->cpf }}</p>
                                    <p><strong>RG: </strong>{{ $data->rg }}</p>
                                    <p><strong>Órgão Exp/UF: </strong>{{ $data->orgao }}</p>
                                    <p><strong>Estado civil: </strong>{{ $data->estado_civil }}</p>
                                    <p><strong>Telefone: </strong>{{ $data->telefone }}</p>
                                </ul>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mb-4 mb-xl-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="table-responsive mb-4 mb-xl-4">
                            <table class="table align-items-center table-flush">
                                <br>
                                <ul>
                                    <p><strong>CEP: </strong>{{ $data->cep }}</p>
                                    <p><strong>Endereço: </strong>{{ $data->endereco }}</p>
                                    <p><strong>Número: </strong>{{ $data->numero }}</p>
                                    <p><strong>Complemento: </strong>{{ $data->complemento }}</p>
                                    <p><strong>Bairro: </strong>{{ $data->bairro }}</p>
                                    <p><strong>Cidade: </strong>{{ $data->cidade }}</p>
                                    <p><strong>Estado: </strong>{{ $data->estado }}</p>
                                    <p><strong>Empresa: </strong>{{ $data->empresa }}</p>
                                    <p><strong>Profissão: </strong>{{ $data->profissao }}</p>
                                    <p><strong>Cargo: </strong>{{ $data->cargo }}</p>
                                </ul>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Dados  Bancários</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="header-body">
            <div class="row ">
                <div class="col text-center mb-xl-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="table-responsive mb-4 mb-xl-4">
                            <table class="table align-items-center table-flush">
                                <br>
                                <ul>
                                    <p><strong>Banco: </strong>{{ $data->banco }}</p>
                                    <p><strong>Agência: </strong>{{ $data->agencia }}</p>
                                    <p><strong>Conta (sem dígito): </strong>{{ $data->conta_corrente }}</p>
                                    <p><strong>Dígito Conta: </strong>{{ $data->digito }}</p>
                                </ul>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
