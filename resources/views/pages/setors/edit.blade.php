@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h1>Editar Setor {{ $setor->nome }}</h1>
                            <form method="post" action="{{ route('setors.update', $setor) }}" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('put')
                                    <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome"></label>
                                        <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('nome', $setor->nome) }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'nome'])
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