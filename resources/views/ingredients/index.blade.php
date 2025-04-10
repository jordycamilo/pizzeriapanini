@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ingredientes</h2>

    <a href="{{ route('ingredients.create') }}" class="btn btn-success mb-3">Nuevo Ingrediente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>
                        <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar ingrediente?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
