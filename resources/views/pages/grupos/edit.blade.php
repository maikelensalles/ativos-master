@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                            <h1>Editar Grupo</h1>
                                <form method="post" action="{{ route('grupos.update', $grupo) }}"  enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('put')
        
                                    <div class="pl-lg-4">
                                        
                                        <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-titulo">{{ __('Titulo') }}</label>
                                            <input type="text" name="titulo" id="input-titulo" class="form-control form-control-alternative{{ $errors->has('titulo') ? ' is-invalid' : '' }}" placeholder="Titulo" value="{{ old('titulo', $grupo->titulo) }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'titulo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-link">{{ __('Link') }}</label>
                                            <input type="text" name="link" id="input-link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="Link" value="{{ old('link', $grupo->link) }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'link'])
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