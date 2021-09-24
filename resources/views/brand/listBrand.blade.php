@extends('layout')
@section('content')
@section('title' , 'Lista Maracas')
@section('h1' , 'Listado de Marcas')

<div class="mb-3 row">
    <div class="col-sm-10"></div>
    <div class="col-sm-3">
        <a href="{{route('brand.form')}}" class="btn btn-primary">Nueva marca</a>
    @if(Session::has('message'))
        <p class="text-danger">{{ Session::get('message') }}</p>
    @endif
    @if(Session::has('message_new'))
        <p class="text-warning">{{ Session::get('message_new') }}</p>
    @endif
    </div>
</div>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listBrand as $brand)
            <tr>
                <td>{{ $brand->brand }}</td>
                <td>
                    <a href="{{route('brand.form', ['id'=> $brand->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{route('brand.delete', ['id'=>$brand->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
