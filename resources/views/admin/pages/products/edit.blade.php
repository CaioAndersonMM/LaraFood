@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <a href="{{route('products.index', $product->id)}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.show', $product->id)}}">{{$product->title}}</a></li>
    <li class="breadcrumb-item active"><a href="">Editar Plano</a></li>
</ol>
    <h1>Editar Produto - {{$product->title}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('admin.pages.products._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Atualizar Produto">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop