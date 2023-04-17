@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Cadastro de Permissão')

@section('content_header')
    <a href=" {{route('permission.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissões</a></li>
    <li class="breadcrumb-item active"><a href="">Criar Permissão</a></li>
</ol>
    <h1>Cadastrar Nova Permissão</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('permission.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-dark" type="submit" value="Criar Permissão">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop