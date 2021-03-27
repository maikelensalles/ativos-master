@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2>Gestão de Funções</h2>
                                </div>
                                <div class="pull-right">
                                    @can('role-create')
                                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Criar Nova Função</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nome</th>
                                    <th width="280px">Ação</th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                                {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>
@endsection
