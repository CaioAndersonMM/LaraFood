@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis</h1>
   
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('perfil.index')}}">Perfis</a></li>
    </ol>
    <h1>Painel</h1>
    <br>
    <div class="card">
        <div class="card-header">
            {{-- #filtros --}}
            <form action="{{route('perfil.search')}}" method="POST" class="form form-inline">
                @csrf
                <input class="form-control" type="text" name="filter" placeholder="{{ $filters['filter'] ?? 'Digite o nome ou a descrição'}}">
                {{--                                                            -> se existir filters coloca o valor do campo no value do input, se não passa default--}}
                <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            {{-- #listagem --}}
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    {{ $profile->name }}
                                </td>
                                <td style="width: 10px;" >
                                    <a href="{{route('perfil.show', $profile->id )}}" class="btn btn-info"><i class="fas fa-eye"></i>  Ver</a>
                                    <a href="{{route('perfil.edit', $profile->id )}}" class="btn btn-warning"><i class="far fa-edit"></i> Editar</a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            @if (isset($filters)) {{-- se filters existir --}}
                {!! $profiles->appends($filters)->links() !!} 
            @else
                {!! $profiles->links() !!} {{-- paginação normal sem filters --}}
            @endif
            
            <a href="{{route('perfil.create')}}" class="btn btn-dark"> <i class="fas fa-plus-circle"></i> Criar Perfil</a> 
        </div>
    </div>
@stop