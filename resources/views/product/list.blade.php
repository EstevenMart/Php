@extends('layout')
@section('title' , 'Lista Productos')
@section('h1' , 'Lista producto')
@section('content')

<a href=" {{route('product.form')}} " class="btn btn-primary">Nuevo Producto</a>

@if(Session::has('message'))
    <p class="text-danger">{{ Session::get('message') }}</p>
@endif
@if(Session::has('messa'))
    <p class="text-primary">{{ Session::get('messa') }}</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Categorie</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $list as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->cost}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->brand->brand}}</td>
                <td>{{$product->category->name}}</td>

                <td>
                    <a href="{{ route('product.form', ['id'=> $product->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('product.delete' , ['id'=> $product->id]) }}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

{{-- @push('name')
    Envia a donde nosotros le digamos un contenido especifico lo va a enviar de ultimo
@endpush

@prepend('name')
    envia un contenido de primero
@endprepend --}}
