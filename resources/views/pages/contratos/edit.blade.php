@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-4 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Investimento: {{ $contratouser->contrato->titulo }}</h1>
            <p class="text-center text-white">Envie mensagens para seus clientes sobre o andamento de sua solicitação de investimento</p>
        </div>
    </div>
</div>
<div class="container-fluid mt--3">
    <div class="header-body">
                <div class="row ">
                    <div class="col text-center mb-xl-0">
                        <div class="col mb-4 mb-xl-0">
                            <div class="table-responsive mb-4 mb-xl-0">
                                <table class="table  table-flush">                                    
                                    <br>
                                    <br>
                                    <p>Algo aqui!</p>
                                    <h3 class="text-danger">Alguma informação aqui!</h3>
                                </table> 

                                <form method="post" action="{{ route('contratos.update', $contratouser) }}" autocomplete="off">
                                    @csrf 
                                    @method('put')
                                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-status">{{ __('Status do Contrato') }}</label>
                                        <input type="text" name="status" id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('status', $contratouser->status) }}" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                    </div>
                                </div>
                            </form> 

                                {{--<form method="post" action="{{ route('contratos.store') }}" autocomplete="off">
                                    @csrf
    
                                    <div class="pl-lg-4">

                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <label for="form-control-label" for="input-status">Status do Contrato</label>
                                            <select name="status"  id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                            <option value="AGUARDE">Aguarde</option>
                                            <option value="APROVADA">Aprovada</option>
                                            <option value="NEGADA">Negada</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'status'])
                                        </div>
    
                                    
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                        </div>
                                    </div>
                                </form>--}} 
                            </div>
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

