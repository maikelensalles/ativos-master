@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                            <h1>Editar Novidade</h1>
                                <form method="post" action="{{ route('novidades.update', $novidade) }}"  enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('put')
        
                                    <div class="pl-lg-4">
                                        
                                        <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-titulo">{{ __('Titulo') }}</label>
                                            <input type="text" name="titulo" id="input-titulo" class="form-control form-control-alternative{{ $errors->has('titulo') ? ' is-invalid' : '' }}" placeholder="Titulo" value="{{ old('titulo', $novidade->titulo) }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'titulo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('sub_titulo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sub_titulo">{{ __('Sub Titulo') }}</label>
                                            <input type="text" name="sub_titulo" id="input-sub_titulo" class="form-control form-control-alternative{{ $errors->has('sub_titulo') ? ' is-invalid' : '' }}" placeholder="Sub Titulo" value="{{ old('sub_titulo', $novidade->sub_titulo) }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'sub_titulo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao">{{ __('Descrição') }}</label>
                                            <input type="text" name="descricao" id="input-descricao" class="form-control form-control-alternative" placeholder="Descrição" value="{{ old('descricao', $novidade->descricao) }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_longa') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_longa">{{ __('Descrição Longa') }}</label>
                                            <input type="text" name="descricao_longa" id="input-descricao_longa" class="form-control form-control-alternative" placeholder="Descrição Longa" value="{{ old('descricao_longa', $novidade->descricao_longa) }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_longa'])
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control form-control-alternative"  required>
                                            @include('alerts.feedback', ['field' => 'image'])
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_media') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_media">{{ __('Descrição Média') }}</label>
                                            <input type="text" name="descricao_media" id="input-descricao_media" class="form-control form-control-alternative" placeholder="Descrição media" value="{{ old('descricao_media', $novidade->descricao_media) }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_media'])
                                        </div>

                                        <div class="form-group{{ $errors->has('obs') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-obs">{{ __('Observações') }}</label>
                                            <input type="text" name="obs" id="input-obs" class="form-control form-control-alternative" placeholder="Observações" value="{{ old('obs', $novidade->obs) }}" required>
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
</div>
@endsection
@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush