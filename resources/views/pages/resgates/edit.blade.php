@extends('layouts.app', ['title' => __('Atualizar saldo')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Enviar Resgate</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
        <div class="header-body">
            <div class="row"> 
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                                <form method="post" action="{{ route('resgates.update', $contratousersaque) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                    <div class="pl-lg-4">

                                        <div class="form-group{{ $errors->has('status_saque') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-status_saque">{{ __('Finalizar solicitação') }}</label>
                                            <select name="status_saque"  id="input-status_saque" class="form-control form-control-alternative{{ $errors->has('status_saque') ? ' is-invalid' : '' }}" required>
                                                <option value="Finalizado">Finalizado! Liberar solicitação de resgate.</option>
                                                </select>                                    
                                            </div>
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
