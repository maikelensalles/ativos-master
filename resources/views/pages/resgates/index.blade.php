@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Enviar resgates</h1>
            <br>
            <div class="col text-center">
                <form action="{{ route('saldos.create') }}">                    
                    <button type="submit" class="btn btn-secundary">Criar Saldo</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            <div class="col">
                {{--<div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Atualizar saldo</h3>
                                <p>Atualize o saldo dispinivel para resgate de cada contrato</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Titulo da proposta</th>
                                    <th scope="col">Investimento</th>
                                    <th scope="col">Data</th>
                                    <th scope="col" width="100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousers as $contratouser)
                                @if($contratouser->deleted_at == NULL)
                                @if($contratouser->status == "Aprovado")

                                <tr>
                                    <td>{{ $contratouser->user->name }}</td>
                                    <td>{{ $contratouser->saque}}</td>
                                    <td>{{ $contratouser->contrato->titulo }}</td>
                                    <td>R${{ $contratouser->valor }}</td>
                                    <td>{{ date( 'd/m/Y' , strtotime($contratouser->created_at)) }}</td>
                                    <td>
                                        <div class="col text-left">
                                            <form action="{{ route('saldos.edit', $contratouser->id) }}">
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-success btn-sm">Atualizar</button>
                                            </form>  
                                        </div>
                                    <br>                                            
                                    </td>
                                </tr>
                                    @else
                                    @endif

                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>--}}

                <br>
                <br>
               
                <div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Solicitações de resgate</h3>
                                <p>Algo aqui</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Saque</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Data</th>
                                    <th scope="col" width="100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousersaques as $contratousersaque)
                                @if($contratousersaque->deleted_at == NULL)

                                <tr>
                                    <td>{{ $contratousersaque->user->name }}</td>
                                    <td>R${{ $contratousersaque->saque}}</td>

                                    @foreach ($contratousers as $contratouser)
                                    @if($contratouser->deleted_at == NULL)
                                    @if($contratouser->status == "Aprovado")
                                        <td>{{ $contratouser->saque}}</td>
                                    @else
                                    @endif
    
                                    @else
                                    @endif
                                    @endforeach

                                        <td>{{ date( 'd/m/Y' , strtotime($contratousersaque->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('resgates.edit', $contratousersaque->id) }}">
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-success btn-sm">Enviar</button>
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
                <div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Resgates aprovados</h3>
                                <p>Todos os saques efetuados com sucesso</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="150">Usuário</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data de pagamento</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousersaques as $contratousersaque)
                                @if($contratousersaque->deleted_at == NULL)
                                @if($contratousersaque->status_saque == "Finalizado")

                                <tr>
                                    <td>{{ $contratousersaque->user->name }}</td>
                                    <td>R${{ $contratousersaque->saque }}</td>
                                    <td>{{ date( 'd/m/Y' , strtotime($contratousersaque->updated_at)) }}</td>
                                </tr>
                                    @else
                                    @endif

                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{--@foreach ($contratousersaques as $contratousersaque)
            <div class="col-xl-4 mr-0">
                <div class="card shadow mb-4 mb-xl-4">
                    <div>
                        <br>
                        <h3 class="card-title-white text-center">{{ $contratousersaque->solicitacao }}</h3>
                        <h3 class="card-title-white text-center">#ID: {{ $contratousersaque->contrato_id }}</h3>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h2 class="text-green">R$ {{ $contratousersaque->saque }}</h2>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col text-left">
                                        <form action="{{ route('resgates.edit', $contratousersaque->id) }}">
                                            @csrf
                                            
                                            <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                                        </form>
 
                                    </div>
                                
                                    <div class="col text-right">
                                        <form action="{{ route('user.show', $contratousersaque->user) }}">
                                            @csrf
                                                
                                                <button type="submit" class="btn btn-default btn-sm">USUÁRIO</button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
           
            @endforeach--}}
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush