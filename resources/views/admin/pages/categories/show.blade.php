@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <a href=" {{route('categories.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.show', $category->id)}}">{{ $category->name }}</a></li>

</ol>
    <h1>Detalhes da Categoria - {{$category->name}}</h1>

    <br>  <br>
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome da Categoria: </b> {{$category->name}}
                </li>
                <li>
                    <b>Descrição: </b> {{$category->description}}
                </li>
                <li>
                    <b>URL: </b> {{$category->url}}
                </li>
                <li>
                    <b>Tenant: </b> {{$category->tenant_id}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">

            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>

            <form action="{{route('categories.destroy', $category->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$category->name}}  </button>
            </form>

            @include('admin.includes.alerts')
            
        </div>
    </div>
@endsection