@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Cadastro de Planos')

@section('content_header')
    <a href="{{route('planos.show', $plans->id)}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.show', $plans->id)}}">{{$plans->name}}</a></li>
    <li class="breadcrumb-item active"><a href="">Editar Plano</a></li>
</ol>
    <h1>Editar Plano - {{$plans->name}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('planos.update', $plans->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                
                @include('admin.pages.plans._partials.form')
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Atualizar Plano">
                    {{-- <input type="submit" class="btn btn-success">Criar</button> --}}
                </div>
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop