@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de pedidos</h2>

    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Nuevo pedido</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pizza</th>
                <th>Tamaño</th>
                <th>Tipo</th>
                <th>Ingredientes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->pizza->name }}</td>
                    <td>{{ $order->size->size }}</td>
                    <td>{{ $order->order_type }}</td>
                    <td>
                        @foreach($order->ingredients as $ingredient)
                            <span class="badge bg-info">{{ $ingredient->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este pedido?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
