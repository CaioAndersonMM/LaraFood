@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <a href="{{route('details.planos.index', $plan->id)}}" class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('details.planos.index', $plan->id)}}">Detalhes de {{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.planos.show', [$plan->id, $detail->id])}}">{{ $detail->name }}</a></li>

</ol>
    <h1>Detalhe - {{$detail->name}}</h1>

    <br> 
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome: </b> {{$detail->name}}
                </li>
                <li>
                    <b>URL: </b> 
                </li>
            </ul>
            
        </div>
        <div class="card-footer">
            <a href="{{route('details.planos.edit', [$plan->id, $detail->id])}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
            <form action="{{route('details.planos.delete', [$plan->id, $detail->id])}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$detail->name}} do {{ $plan->name }} </button>
            </form>
        </div>
    </div>
@endsection