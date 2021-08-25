@extends('layout')
@section('title' , 'Lista Marca')
@section('h1' , 'Lista Marca')
@section('content')

<div class="mb-3 row">
    <div class="col-sm-10"></div>
    <div class="col-sm-3">
        <a href="{{route('brand.formBrand')}}" class="btn btn-primary">Nueva marca</a>
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
            <th>Brand</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listBrand as $brand)
            <tr>
                <td>{{ $brand->brand }}</td>
                <td>
                    <a href="{{ route('brand.formBrand', ['id'=> $brand->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('brand.delete' , ['id'=> $brand->id]) }}" class="btn btn-danger">Borrar</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
