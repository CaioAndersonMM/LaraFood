@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <a href=" {{route('users.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></li>

</ol>
    <h1>Detalhes do Usuário - {{$user->name}}</h1>

    <br>  <br>
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome do Usuário: </b> {{$user->name}}
                </li>
                <li>
                    <b>Email: </b> {{$user->email}}
                </li>
                <li>
                    <b>Empresa: </b> {{$user->tenant->name}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">

            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>

            <form action="{{route('users.destroy', $user->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$user->name}}  </button>
            </form>

            @include('admin.includes.alerts')
            
        </div>
    </div>
@endsection