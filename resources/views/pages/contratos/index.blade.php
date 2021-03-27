@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Contratos</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
                <div class="col">

                    <div class="card shadow"> 
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Solicitações Reservadas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" width="150">Usuário</th>
                                        <th scope="col">Titulo da proposta</th> 
                                        <th scope="col">Investimento</th>
                                        <th scope="col">Data</th>
                                        <th scope="col" width="100">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contratousers as $contratouser)
                                    @if($contratouser->status == NULL)

                                    <tr>
                                            <td>{{ $contratouser->user->name }}</td>
                                            <td>{{ $contratouser->contrato->titulo }}</td>
                                            <td>R${{ $contratouser->valor }}</td>
                                            <td>{{ date( 'd/m/Y' , strtotime($contratouser->created_at)) }}</td>
                                            <td>
                                                <form action="{{ route('contratos.edit', $contratouser->id) }}">
                                                    @csrf
                                                    
                                                    <button type="submit" class="btn btn-success btn-sm">ANALISAR</button>
                                                </form>
                                                <br>                                            
                                            </td>
                                        </tr>
                                        @else
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>
                <br>
               
                <div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Solicitações aprovadas</h3>
                                <p>Pagamento efetuado com sucesso!</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Titulo da proposta</th> 
                                    <th scope="col">Investimento</th>
                                    <th scope="col">Data</th>
                                    <th scope="col" width="100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousers as $contratouser)
                                @if($contratouser->status == "Aprovado")
                                <tr>
                                        <td>{{ $contratouser->contrato->titulo }}</td>
                                        <td>R${{ $contratouser->valor }}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime($contratouser->updated_at)) }}</td>
                                        <td>
                                            <form action="{{ route('contratos.edit', $contratouser->id) }}">
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-success btn-sm">ANALISAR</button>
                                            </form>
                                            <br>
                                                                                         
                                        </td>
                                    </tr>                            
                                    
                                    @else
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                    {{--<div class="card shadow mb-4 mb-xl-4">
                        <div>
                            <br>
                            <h2 class="card-title-white text-center" >#ID: {{ $contratouser->contrato->id }}</h2>

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
                                                    
                                                    <button type="submit" class="btn btn-default btn-sm">USUÁRIO</button>
                                            </form>
                                                <br>   
                                        </div>
                                 
                                        <div class="col text-right">
                                            <form action="{{ route('contratos.edit', $contratouser->id) }}">
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-default btn-sm">ENVIAR STATUS</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>--}}
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