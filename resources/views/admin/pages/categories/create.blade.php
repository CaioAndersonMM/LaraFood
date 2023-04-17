@extends('adminlte::page')

@section('title', 'Cadastro de Nova Categoria')

@section('content_header')
    <a href=" {{route('categories.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
    <li class="breadcrumb-item active"><a href="">Criar Categoria</a></li>
</ol>
    <h1>Cadastrar Nova Categoria</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.categories._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-dark" type="submit" value="Criar Categoria">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop