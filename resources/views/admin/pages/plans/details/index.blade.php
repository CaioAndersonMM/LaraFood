@extends('adminlte::page')

@section('title', "Detalhes do Plano - {$plan->name}" )

@section('content_header')
    <a href="{{route('planos.index', $plan->id)}} " class="btn btn-dark"> <i class="fas fa-backward"></i> </a>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('planos.index')}}">Planos</a></li>
    {{-- <li class="breadcrumb-item"><a href="{{route('planos.show', $plan->id)}}">{{ $plan->name }}</a></li>--}}
    <li class="breadcrumb-item active"><a href="{{route('details.planos.index', $plan->id)}}">Detalhes</a></li>
</ol>
    <h1>Detalhes do Plano: {{ $plan->name }}</h1>
    <br>
    <div class="card">
        <div class="card-body">
            {{-- #listagem --}}
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th style="width: 20%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->name }}</td>
                                <td>
                                    <a href="{{route('details.planos.show', [$plan->id, $detail->id] )}}" class="btn btn-info"><i class="fas fa-eye"></i>  Ver</a>
                                    <a href="{{route('details.planos.edit', [$plan->id, $detail->id] )}}" class="btn btn-warning"><i class="far fa-edit"></i>  Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            @if (isset($filters)) {{-- se filters existir --}}
                {!! $details->appends($filters)->links() !!} 
            @else
                {!! $details->links() !!} {{-- paginação normal sem filters --}}
            @endif
            
            <a href=" {{route('details.planos.create', $plan->id)}} " class="btn btn-dark"> <i class="fas fa-plus-circle"></i> Criar Detalhe (?)</a> 
        </div>
    </div>
@stop