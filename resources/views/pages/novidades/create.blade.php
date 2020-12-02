@extends('layouts.app', ['title' => __('Cadastrar Novidade')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">
                        
                        <div class="p-4 bg-secondary">
                            <h1>Cadastrar Nova Novidade</h1> 
                                <form method="post" action="{{ route('novidades.store') }}" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="pl-lg-4">
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

                                        <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao">Descrição</label>
                                            <input type="text" name="descricao" id="input-descricao" class="form-control form-control-alternative" placeholder="Descrição" value="{{ old('descricao') }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_longa') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_longa">Descrição Longa</label>
                                            <input type="text" name="descricao_longa" id="input-descricao_longa" class="form-control form-control-alternative" placeholder="Descrição Longa" value="{{ old('descricao_longa') }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_longa'])
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control form-control-alternative"  required>
                                            @include('alerts.feedback', ['field' => 'image'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_media') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_media">Descrição media</label>
                                            <input type="text" name="descricao_media" id="input-descricao_media" class="form-control form-control-alternative" placeholder="Descrição media" value="{{ old('descricao_media') }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_media'])
                                        </div>

                                        <div class="form-group{{ $errors->has('obs') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-obs">Observações</label>
                                            <input type="text" name="obs" id="input-obs" class="form-control form-control-alternative" placeholder="Observações" value="{{ old('obs') }}" required>
                                            @include('alerts.feedback', ['field' => 'obs'])
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