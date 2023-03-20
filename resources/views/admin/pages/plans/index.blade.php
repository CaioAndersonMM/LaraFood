@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Tela Principal</h1>
   
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('planos.index')}}">Planos</a></li>
    </ol>
    <p>Bem vindo ao meu lindo painel de ADMIN </p>
    <h1>Painel</h1>
    <br>
    <div class="card">
        <div class="card-header">
            {{-- #filtros --}}
            <form action="{{route('planos.search')}}" method="POST" class="form form-inline">
                @csrf
                <input class="form-control" type="text" name="filter" placeholder="{{ $filters['filter'] ?? 'Digite o nome ou a descrição'}}">
                {{--                                                            -> se existir filters coloca o valor do campo no value do input, se não passa default--}}
                <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            {{-- #listagem --}}
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>{{ $plan->name }}</td>
                                <td>R$ {{number_format($plan->price, 2, ',','.')}}</td>
                                <td>
                                    <a href="{{route('planos.show', $plan->id )}}" class="btn btn-info"><i class="fas fa-eye"></i>  Ver</a>
                                    <a href="{{route('details.planos.index', $plan->id )}}" class="btn btn-warning">Detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            @if (isset($filters)) {{-- se filters existir --}}
                {!! $plans->appends($filters)->links() !!} 
            @else
                {!! $plans->links() !!} {{-- paginação normal sem filters --}}
            @endif
            
            <a href=" {{route('planos.create')}} " class="btn btn-dark"> <i class="fas fa-plus-circle"></i> Criar Plano</a> 
        </div>
    </div>
@stop