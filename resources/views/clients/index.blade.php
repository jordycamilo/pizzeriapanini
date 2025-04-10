@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Clientes</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->user->name ?? 'Sin usuario' }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este cliente?')">
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
