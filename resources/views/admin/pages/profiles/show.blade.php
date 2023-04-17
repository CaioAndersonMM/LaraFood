@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <a href="{{route('perfil.index', $profile->id)}}" class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('perfil.index')}}">Perfis</a></li>
    <li class="breadcrumb-item"><a href="">Detalhes do Perfil {{$profile->name}}</a></li>

</ol>
    <h1>Perfil - {{$profile->name}}</h1>

    <br> 
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome: </b> {{$profile->name}}
                </li>
                <li>
                    <b>Descrição: </b> {{$profile->description}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">
            <a href="{{route('perfil.edit', $profile->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
            <form action="{{route('perfil.destroy', $profile->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$profile->name}}</button>
            </form>
        </div>
    </div>
@endsection