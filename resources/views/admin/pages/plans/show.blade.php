@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <a href=" {{route('planos.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.show', $plan->id)}}">{{ $plan->name }}</a></li>

</ol>
    <h1>Detalhes do Plano - {{$plan->name}}</h1>

    <br>  <br>
    <div class="card">
        <div class="card-body">    
            <ul>
                <li>
                    <b>Nome do Plano: </b> {{$plan->name}}
                </li>
                <li>
                    <b>Descrição: </b> {{$plan->description}}
                </li>
                <li>
                    <b>Preço: </b> R$ {{number_format($plan->price, 2, ',','.')}}
                </li>
                <li>
                    <b>URL: </b> {{$plan->url}}
                </li>
            </ul>
            
        </div>
        <div class="card-footer">

            <a href="{{route('details.planos.index', $plan->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i> Detalhes</a>
            <a href="{{route('planos.edit', $plan->id)}}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>

            <form action="{{route('planos.delete', $plan->id)}}" method="post" class="btn">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> <b> Deletar</b> {{$plan->name}}  </button>
            </form>

            @include('admin.includes.alerts')
            
        </div>
    </div>
@endsection