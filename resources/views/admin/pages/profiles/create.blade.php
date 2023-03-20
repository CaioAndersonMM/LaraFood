@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Cadastro de Perfis')

@section('content_header')
    <a href=" {{route('perfil.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('perfil.index')}}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="">Criar Perfil</a></li>
</ol>
    <h1>Cadastrar Novo Perfil</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('perfil.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.profiles._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-dark" type="submit" value="Criar Plano">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop