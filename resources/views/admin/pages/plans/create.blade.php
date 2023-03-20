@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Cadastro de Planos')

@section('content_header')
    <a href=" {{route('planos.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i></a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="">Criar Plano</a></li>
</ol>
    <h1>Cadastrar Novo Plano</h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('planos.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans._partials.form')
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