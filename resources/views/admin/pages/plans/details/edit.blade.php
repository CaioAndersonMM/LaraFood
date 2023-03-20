@extends('adminlte::page')@extends('adminlte::page')

@section('title', 'Editar Detalhe')

@section('content_header')
    <a href="{{route('details.planos.index', $plan->id)}}" class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.show', $plan->id)}}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{route('details.planos.index', $plan->id)}}">Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.planos.edit', [$plan->id , $detail->id])}}">Editar</a></li>
</ol>
    <h1>Editar Detalhe: {{$detail->name}} </h1>   
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.planos.update', [$plan->id, $detail->id])}}" class="form" method="POST">
                @include('admin.includes.alerts')
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="name">Nome do Detalhe: </label>
                        <input type="text" class="form-control" name="name" value="{{$detail->name ?? old('description')}}" required>
                 </div>
                    <input class="form-control btn btn-success" type="submit" value="Editar">
                </form>    
            </form>      
        </div>
        <div class="card-footer">
       
        </div>
    </div>
@stop