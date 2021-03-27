@extends('layouts.app', ['title' => __('Cadastrar Saldo')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">
                        
                        <div class="p-4 bg-secondary">
                            <h1>Cadastrar Novo Saldo</h1> 
                                <form method="post" action="{{ route('saldos.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('saldo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-saldo">Saldo</label>
                                            <input type="text" name="saldo" id="input-saldo" class="form-control form-control-alternative{{ $errors->has('saldo') ? ' is-invalid' : '' }}" placeholder="Saldo" value="{{ old('saldo') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'saldo'])
                                        </div>

                                        <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_id">Usuário</label>
                                            <input type="text" name="user_id" id="input-user_id" class="form-control form-control-alternative{{ $errors->has('user_id') ? ' is-invalid' : '' }}" placeholder="Usuário" value="{{ old('user_id') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'user_id'])
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