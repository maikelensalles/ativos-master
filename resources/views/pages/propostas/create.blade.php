@extends('layouts.app', ['title' => __('Cadastrar Contrato')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">                       
                        <div class="p-4 bg-secondary">
                            <h1>Cadastrar Novo Contrato</h1> 
                                <form method="post" action="{{ route('propostas.store') }}" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control form-control-alternative"  required>
                                        @include('alerts.feedback', ['field' => 'image'])
                                    </div>

                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('contrato_setor_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-nome">Setor</label>
                                            <select name="contrato_setor_id" id="input-setor" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" required>
                                                @foreach ($setors as $setor)
                                                    @if($setor['id'] == old('document'))
                                                        <option value="{{$setor['id']}}" selected>{{$setor['nome']}}</option>
                                                    @else
                                                        <option value="{{$setor['id']}}">{{$setor['nome']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'contrato_setor_id'])
                                        </div>
                                        <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-titulo">Titulo</label>
                                            <input type="text" name="titulo" id="input-titulo" class="form-control form-control-alternative{{ $errors->has('titulo') ? ' is-invalid' : '' }}" placeholder="Titulo" value="{{ old('titulo') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'titulo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('sub_titulo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sub_titulo">Sub Titulo</label>
                                            <input type="text" name="sub_titulo" id="input-sub_titulo" class="form-control form-control-alternative{{ $errors->has('sub_titulo') ? ' is-invalid' : '' }}" placeholder="Sub Titulo" value="{{ old('sub_titulo') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'sub_titulo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('valor_cota') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valor_cota">Valor da Cota</label>
                                            <input type="number" name="valor_cota" id="input-valor_cota" class="form-control form-control-alternative{{ $errors->has('valor_cota') ? ' is-invalid' : '' }}" placeholder="Valor da Cota" value="{{ old('valor_cota') }}" required>
                                            @include('alerts.feedback', ['field' => 'valor_cota'])
                                        </div>

                                        <div class="form-group{{ $errors->has('participacao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-participacao">Participação</label>
                                            <input type="number" step=".01" name="participacao" id="input-participacao" class="form-control form-control-alternative" placeholder="Participação" value="{{ old('participacao') }}" required>
                                            @include('alerts.feedback', ['field' => 'participacao'])
                                        </div>

                                        <div class="form-group{{ $errors->has('valor_captado') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valor_captado">Valor Captado</label>
                                            <input type="number" name="valor_captado" id="input-valor_captado" class="form-control form-control-alternative" placeholder="Valor Captado" value="{{ old('valor_captado') }}" required>
                                            @include('alerts.feedback', ['field' => 'valor_captado'])
                                        </div>

                                        <div class="form-group{{ $errors->has('rentabilidade_alvo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-rentabilidade_alvo">Rentabilidade Alvo</label>
                                            <input type="number" step=".01" name="rentabilidade_alvo" id="input-rentabilidade_alvo" class="form-control form-control-alternative" placeholder="Rentabilidade Alvo" value="{{ old('rentabilidade_alvo') }}" required>
                                            @include('alerts.feedback', ['field' => 'rentabilidade_alvo'])
                                        </div> 

                                        <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-body">Conteúdo</label>
                                            <textarea name="body" id="" cols="30" rows="10" class="form-control form-control-alternative{{ $errors->has('body') ? ' is-invalid' : '' }}" value="{{ old('body') }}"></textarea>
                                            @include('alerts.feedback', ['field' => 'body'])
                                        </div>

                                        <div class="form-group{{ $errors->has('body_2') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-body_2">Conteúdo 2</label>
                                            <textarea name="body_2" id="" cols="30" rows="10" class="form-control form-control-alternative{{ $errors->has('body_2') ? ' is-invalid' : '' }}" value="{{ old('body_2') }}"></textarea>
                                            @include('alerts.feedback', ['field' => 'body_2'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao">Titulo (opcional)</label>
                                            <input type="text" name="descricao" id="input-descricao" class="form-control form-control-alternative" placeholder="Titulo (opcional)" value="{{ old('descricao') }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_longa') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_longa">Descrição (opcional)</label>
                                            <input type="text" name="descricao_longa" id="input-descricao_longa" class="form-control form-control-alternative" placeholder="Descrição (opcional)" value="{{ old('descricao_longa') }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_longa'])
                                        </div>   
                                        
                                        <div class="form-group{{ $errors->has('body_3') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-body_3">Conteúdo 3</label>
                                            <textarea name="body_3" id="" cols="30" rows="10" class="form-control form-control-alternative{{ $errors->has('body_3') ? ' is-invalid' : '' }}" value="{{ old('body_3') }}"></textarea>
                                            @include('alerts.feedback', ['field' => 'body_3'])
                                        </div>

                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <label for="form-control-label" for="input-status">Status da Proposta</label>
                                            <select name="status"  id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                            <option value="INVESTIR">Aberto</option>
                                            <option value="ENCERRADO">Encerrado</option>
                                            <option value="LISTA DE ESPERA">Lista de espera</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'status'])
                                        </div>                         
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                        </div>
                                    </div>
                                </form>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection