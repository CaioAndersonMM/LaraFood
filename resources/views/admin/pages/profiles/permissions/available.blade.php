@extends('adminlte::page')

@section('title', 'Vincular Permissão')

@section('content_header')
    <h1>Vincular Permissões</h1>
   
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissões</a></li>
        <li class="breadcrumb-item"><a href="{{route('perfil.permission', $profile->id)}}">Permissões do Perfil {{ $profile->name }}</a></li>
        <li class="breadcrumb-item active"><a href="">Vincular Permissões ao Perfil {{ $profile->name }}</a></li>
    </ol>
    <a href="{{route('perfil.permission', $profile->id)}}" class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
    <br> <br>
    <div class="card">
        
         {{--
        <div class="card-header">
            #filtros 
            <form action="{{route('permission.search')}}" method="POST" class="form form-inline">
                @csrf
                <input class="form-control" type="text" name="filter" placeholder="{{ $filters['filter'] ?? 'Digite o nome ou a descrição'}}">                                                        
                -> se existir filters coloca o valor do campo no value do input, se não passa default
                <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        --}}
        <div class="card-body">
            {{-- #listagem --}}
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th width="5px">#</th>
                            <th> Permissões Disponíveis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('perfil.permission.attach', $profile->id) }}" method="POST">
                            @csrf
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}">
                                    </td>
                                    <td style="width: 10px;" >
                                        {{ $permission->name }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="50">
                                    @include('admin.includes.alerts')
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </td>
                            </tr>
                        </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters)) {{-- se filters existir --}}
                {!! $permissions->appends($filters)->links() !!} 
            @else
                {!! $permissions->links() !!} {{-- paginação normal sem filters --}}
            @endif
        </div>
    </div>
@stop