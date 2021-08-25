@extends('layout')
@section('title' , 'Lista Categoria')
@section('h1' , 'Lista Categoria')
@section('content')

<div class="mb-3 row">
    <div class="col-sm-10"></div>
    <div class="col-sm-3">
        <a href=" {{route('categorie.formCategorie')}} " class="btn btn-primary">Nueva Categoria</a>
     @if(Session::has('message'))
        <p class="text-danger">{{ Session::get('message') }}</p>
    @endif
    @if(Session::has('messa'))
        <p class="text-warning">{{ Session::get('messa') }}</p>
    @endif
    </div>
</div>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listCategorie as $categorie)
            <tr>
                <td>{{ $categorie->name }}</td>
                <td>{{ $categorie->description }}</td>
                <td>
                    <a href="{{ route('categorie.formCategorie', ['id'=> $categorie->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('categorie.delete' , ['id'=> $categorie->id]) }}" class="btn btn-danger">Borrar</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
