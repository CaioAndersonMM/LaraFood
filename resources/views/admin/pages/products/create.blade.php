@extends('adminlte::page')

@section('title', 'Cadastro de Novo Produto')

@section('content_header')
    <a href=" {{route('products.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="">Criar Produto</a></li>
</ol>
    <h1>Cadastrar Novo Produto</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('products.store')}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.products._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-dark" type="submit" value="Criar Produto">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop