@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Tamaños de Pizza</h2>
    <a href="{{ route('pizza_sizes.create') }}" class="btn btn-primary mb-3">Nuevo tamaño</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pizza</th>
                <th>Tamaño</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sizes as $size)
            <tr>
                <td>{{ $size->pizza->name }}</td>
                <td>{{ $size->size }}</td>
                <td>${{ $size->price }}</td>
                <td>
                    <a href="{{ route('pizza_sizes.edit', $size->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('pizza_sizes.destroy', $size->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
