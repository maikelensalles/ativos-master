
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
                                    <h3 class="mb-0">Dados Cadastrais</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" width="100">Imagem</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>
                                                {{--@if ($produto->image)
                                                    <img src="{{ url("storage/{$produto->image}") }}" alt="{{ $produto->nome }}" style="max-width: 100px;">
                                                @endif--}}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
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