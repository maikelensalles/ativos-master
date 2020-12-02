@extends('layouts.app', ['title' => __('Cadastrar Saque')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                            <h1>Cadastrar Novo Saque</h1> 
                                <form method="post" action="{{ route('resgates.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('saque') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-saque">saque</label>
                                            <input type="number" name="saque" id="input-saque" class="form-control form-control-alternative{{ $errors->has('saque') ? ' is-invalid' : '' }}" placeholder="saque" value="{{ old('saque') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'saque'])
                                        </div>

                                        <div class="form-group{{ $errors->has('contrato_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-contrato_id">ID do contrato</label>
                                            <select name="contrato_id" id="input-setor" class="form-control form-control-alternative{{ $errors->has('contrato_id') ? ' is-invalid' : '' }}" required>
                                                @foreach ($contratos as $contrato)
                                                    @if($contrato['id'] == old('document'))
                                                        <option value="{{$contrato['id']}}" selected>{{$contrato['id']}}</option>
                                                    @else
                                                        <option value="{{$contrato['id']}}">{{$contrato['id']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>                                            
                                            @include('alerts.feedback', ['field' => 'contrato_id'])
                                        </div>

                                        <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_id">ID do user</label>
                                            <select name="user_id" id="input-setor" class="form-control form-control-alternative{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                                                @foreach ($users as $user)
                                                    @if($user['id'] == old('document'))
                                                        <option value="{{$user['id']}}" selected>{{$user['name']}}</option>
                                                    @else
                                                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>                                            
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