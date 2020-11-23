@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Contratos</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($contratousers as $contratouser)
                <div class="col-xl-4 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div>
                            <br>
                            <h2 class="card-title-white text-center" >{{ $contratouser->user->name }}</h2>

                            <h2 class="card-title-white text-center" >{{ $contratouser->contrato->titulo }}</h2>
                            <h3 class="card-title-white text-center"></h3>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Investimento:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $contratouser->valor }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Rentabilidade Alvo:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white ">R${{ $contratouser->contrato->rentabilidade_alvo }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor Captado:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $contratouser->contrato->valor_captado }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col text-left">
                                            <form action="{{ route('user.show', $contratouser->user) }}">
                                                @csrf
                                                    
                                                    <button type="submit" class="btn btn-success btn-sm">USUÁRIO</button>
                                                </form>
                                                <br>   
                                        </div>
                                 
                                        <div class="col text-right">
                                            <button type="button" class="btn btn-block btn-warning btn-sm " data-toggle="modal" data-target="#modal-notification-{{ $contratouser->contrato->id }}">ENVIAR STATUS</button>
                                            <div class="modal fade" id="modal-notification-{{ $contratouser->contrato->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                              <div class="modal-content bg-gradient-danger">
                                                  
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="modal-title-notification">Titulo fixo aqui...</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">×</span>
                                                      </button>
                                                  </div>
                                                  
                                                  <div class="modal-body">
                                                      
                                                      <div class="py-3 text-center">
                                                          <i class="ni ni-bell-55 ni-3x"></i>
                                                          <h3 class="heading mt-4">Obrigado por investir conosco!</h3>
                                                          <h4 class="heading mt-4">{{ $contratouser->contrato->titulo }}:</h4>

                                                          <form method="post" action="{{ route('contratos.store') }}" autocomplete="off">
                                                            @csrf

                                                            <div class="pl-lg-4">
                                                                                                                                       
                                                                <div class="form-group{{ $errors->has('notificacao') ? ' has-danger' : '' }}">
                                                                    <label class="form-control-label" for="input-notificacao"></label>
                                                                    <input type="text" name="notificacao" id="input-notificacao" class="form-control form-control-alternative{{ $errors->has('notificacao') ? ' is-invalid' : '' }}" placeholder="Status da proposta..." value="{{ old('notificacao', $contratouser->notificacao) }}" required autofocus>
                                                                </div>
                        
                                                            
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                                                </div>
                                                            </div>
                                                        </form>                                                      </div>
                                                      
                                                  </div>
                                                  
                                                  <div class="text-center">
                                                      <button type="button" class="btn btn-white ml-auto" data-dismiss="modal">Ok, entendi</button>
                                                      <br>
                                                  </div>
                                                  <br>
                                              </div>
                                          </div>
                                      </div>
                                      
                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush