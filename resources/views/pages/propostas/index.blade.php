@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow"> 
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Listagem De Propostas</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('propostas.create') }}" class="btn btn-sm btn-primary">Criar Novas Propostas</a>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('setors.index') }}" class="btn btn-sm btn-primary">Criar Novo Setor</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" width="100">Imagem</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col" width="100">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>
                                                @if ($contrato->image)
                                                    <img src="{{ url("storage/{$contrato->image}") }}" alt="{{ $contrato->titulo }}" style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>{{ $contrato->titulo }}</td>
                                            <td>
                                                <form action="{{ route('propostas.edit', $contrato->id) }}">
                                                    @csrf
                                                    
                                                    <button type="submit" class="btn btn-success btn-sm">Editar</button>
                                                </form>
                                                <br>
                                                <form action="{{ route('propostas.destroy', $contrato->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                                </form>                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection