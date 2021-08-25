@extends('layout')

@section('title',$categorie->id ? 'Editar Categoria' : 'Nuevo Categoria')
@section('h1' , $categorie->id ? 'Editar Categoria' : 'Nuevo Categoria')

@section('content')

<form action="{{ route('categorie.saveCategorie') }}" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{ $categorie->id }}">

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name'
            value="{{ @old('name') ? @old('name') : $categorie->name }}">
        </div>
        @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name='description'
            value="{{ @old('description') ? @old('description') : $categorie->description }}">
        </div>
        @error('description')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="/categories" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection
