@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Tela Principal</h1>
   
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
    </ol>
    <h1>Painel</h1>
    <br>
    <div class="card">
        <div class="card-header">
            {{-- #filtros --}}
            <form action="{{route('products.search')}}" method="POST" class="form form-inline">
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
                            <th>Imagem</th>
                            <th>Título</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                                    {{-- $product->image --}}
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    <a href="{{route('products.show', $product->id )}}" class="btn btn-info"><i class="fas fa-eye"></i>  Ver</a>
                                    <a href="{{route('products.edit', $product->id )}}" class="btn btn-info"><i class="far fa-edit"></i>  Editar</a>
                             {{--   <a href="{{route('details.products.index', $plan->id )}}" class="btn btn-warning">Detalhes</a> --}} 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            @if (isset($filters)) {{-- se filters existir --}}
                {!! $products->appends($filters)->links() !!} 
            @else
                {!! $products->links() !!} {{-- paginação normal sem filters --}}
            @endif
            
            <a href=" {{route('products.create')}} " class="btn btn-dark"> <i class="fas fa-plus-circle"></i> Criar Produto</a> 
        </div>
    </div>
@stop