@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Pizzas</h1>
    <a href="{{ route('pizzas.create') }}" class="btn btn-success mb-3">Crear nueva pizza</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $pizza)
            <tr>
                <td>{{ $pizza->name }}</td>
                <td>{{ $pizza->description }}</td>
                <td>${{ $pizza->price }}</td>
                <td>
                    <a href="{{ route('pizzas.edit', $pizza) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('pizzas.destroy', $pizza) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
