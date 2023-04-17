@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <a href="{{route('permission.index')}}" class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissões</a></li>
    <li class="breadcrumb-item"><a href="">Detalhes da Permissão {{$permission->name}}</a></li>

</ol>
    <h1>Permissão - {{$permission->name}}</h1>

    <br> 
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome: </b> {{$permission->name}}
                </li>
                <li>
                    <b>Descrição: </b> {{$permission->description}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">
            <a href="{{route('permission.edit', $permission->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
            <form action="{{route('permission.destroy', $permission->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$permission->name}}</button>
            </form>
        </div>
    </div>
@endsection