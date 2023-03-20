@extends('adminlte::page')@extends('adminlte::page')


@section('title', 'Cadastro de Detalhes')

@section('content_header')
    <a href=" {{route('planos.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('planos.show', $plan->id)}}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.planos.index', $plan->id)}}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.planos.create', $plan->id)}}">Novo Detalhes</a></li>
    </ol>
    <h1>Cadastrar Novo Detalhe ao Plano: {{ $plan->name }}</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.planos.store', $plan->id)}}" class="form" method="POST">
                @include('admin.includes.alerts')
                @csrf
                <div class="form-group">
                    <label for="name">Nome do Detalhe: </label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                </div>
                <input class="form-control btn btn-success" type="submit" value="Criar Detalhe">
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop