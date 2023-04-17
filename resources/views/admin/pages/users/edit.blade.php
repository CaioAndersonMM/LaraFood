@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <a href="{{route('users.index', $user->id)}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></li>
    <li class="breadcrumb-item active"><a href="">Editar Plano</a></li>
</ol>
    <h1>Editar Usuário - {{$user->name}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                
                @include('admin.pages.users._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Atualizar Usuário">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop