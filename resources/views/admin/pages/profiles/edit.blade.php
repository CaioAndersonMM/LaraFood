@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Edição de Perfil')

@section('content_header')
    <a href="{{route('perfil.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('perfil.index')}}">Perfis</a></li>
    <li class="breadcrumb-item"><a href=""></a></li>
    <li class="breadcrumb-item active"><a href="">Editar Perfil</a></li>
</ol>
    <h1>Editar Perfil - {{$profile->name}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('perfil.update', $profile->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                
                @include('admin.pages.profiles._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Atualizar Perfil">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop