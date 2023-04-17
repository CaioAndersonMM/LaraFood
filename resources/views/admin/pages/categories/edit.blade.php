@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <a href="{{route('categories.index', $category->id)}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
    <li class="breadcrumb-item active"><a href="">Editar Plano</a></li>
</ol>
    <h1>Editar Categoria - {{$category->name}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.update', $category->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                
                @include('admin.pages.categories._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Atualizar Categoria">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop