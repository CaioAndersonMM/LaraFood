@extends('adminlte::page')

@section('title', 'Detalhes da Produto')

@section('content_header')
    <a href=" {{route('products.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.show', $product->id)}}">{{ $product->title }}</a></li>

</ol>
    <h1>Detalhes da Produto - {{$product->title}}</h1>

    <br>  <br>
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Foto </b>
                    <br>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                </li>
                <li>
                    <b>Título do Produto: </b> {{$product->title}}
                </li>
                <li>
                    <b>Flag: </b> {{$product->flag}}
                </li>
                <li>
                    <b>Description: </b> {{$product->description}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">

            <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>

            <form action="{{route('products.destroy', $product->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$product->title}}  </button>
            </form>

            @include('admin.includes.alerts')
            
        </div>
    </div>
@endsection