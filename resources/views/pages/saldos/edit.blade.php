@extends('layouts.app', ['title' => __('Atualizar saldo')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Atualizar saldo</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                                <form method="post" action="{{ route('saldos.update', $usersaldo) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                    <div class="pl-lg-4">

                                        <div class="form-group{{ $errors->has('saldo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-saldo">{{ __('Saldo disponivel') }}</label>
                                            <input type="text" name="saldo" id="input-saldo" class="form-control form-control-alternative{{ $errors->has('saldo') ? ' is-invalid' : '' }}" value="R$ {{ old('saldo', $contratouser->saldo) }}" required autofocus>
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
@include('layouts.footers.auth')

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush